<?php
namespace Models;

class ActiveRecord {

    // DATABASE
    protected static $db;
    protected static $table = '';
    protected static $dbColumns = [];

    // Alerts and Messages
    protected static $alerts = [];

    // Define the database connection - includes/database.php
    public static function setDB($database) {
        self::$db = $database;
    }

    public static function setAlert($type, $message) {
        static::$alerts[$type][] = $message;
    }

    // Validation
    public static function getAlerts() {
        return static::$alerts;
    }

    public function validate() {
        static::$alerts = [];
        return static::$alerts;
    }

    // Records - CRUD
    public function save() {
        $result = '';
        if (!is_null($this->id)) {
            // Update
            $result = $this->update();
        } else {
            // Create a new record
            $result = $this->create();
        }
        return $result;
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$table;
        $result = self::querySQL($query);
        return $result;
    }

    // Find a record by its id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$table . " WHERE id = $id";
        $result = self::querySQL($query);
        return array_shift($result);
    }

    // Get Record
    public static function get($limit) {
        $query = "SELECT * FROM " . static::$table . " LIMIT $limit";
        $result = self::querySQL($query);
        return array_shift($result);
    }

    // Search Where with Column
    public static function where($column, $value) {
        $query = "SELECT * FROM " . static::$table . " WHERE $column = '$value'";
        $result = self::querySQL($query);
        return array_shift($result);
    }

    // SQL for Advanced Queries
    public static function SQL($query) {
        $result = self::querySQL($query);
        return $result;
    }

    // Create a new record
    public function create() {
        // Sanitize data
        $attributes = $this->sanitizeAttributes();

        // Insert into the database
        $query = "INSERT INTO " . static::$table . " (";
        $query .= join(', ', array_keys($attributes));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($attributes));
        $query .= "')";

        // Query result
        $result = self::$db->query($query);

        return [
            'result' => $result,
            'id' => self::$db->insert_id
        ];
    }

    public function update($column, $data) {
        // Sanitize data
        $attributes = $this->sanitizeAttributes();

        // Iterate to add each field to the database
        $values = [];
        foreach ($attributes as $key => $value) {
            $values[] = "{$key}='{$data[$key]}'";
        }

        $query = "UPDATE " . static::$table . " SET ";
        $query .= join(', ', $values);
        $query .= " WHERE $column = '" . self::$db->escape_string($data[$column]) . "'";
        $query .= " LIMIT 1";

        $result = self::$db->query($query);
        return $result;
    }

    // Delete a record - Takes the Active Record's ID
    public function delete($column, $value) {
        $query = "DELETE FROM " . static::$table . " WHERE $column = '" . self::$db->escape_string($value) . "' LIMIT 1";
        $result = self::$db->query($query);
        return $result;
    }

    public static function querySQL($query) {
        // Query the database
        $result = self::$db->query($query);

        // Iterate the results
        $array = [];
        while ($record = $result->fetch_assoc()) {
            $array[] = static::createObject($record);
        }

        // Free up memory
        $result->free();

        // Return the results
        return $array;
    }

    protected static function createObject($record) {
        $object = new static;

        foreach ($record as $key => $value) {
            if (property_exists($object, $key)) {
                $object->$key = $value;
            }
        }

        return $object;
    }

    // Identify and gather database attributes
    public function attributes() {
        $attributes = [];
        foreach (static::$dbColumns as $column) {
            if ($column === 'id') continue;
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    public function sanitizeAttributes() {
        $attributes = $this->attributes();
        $sanitized = [];
        foreach ($attributes as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }
        return $sanitized;
    }

    public function sync($args = []) {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
