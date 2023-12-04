<main class="main-container">
    <div class="image">
        <img src="/build/img/logoGestion.png" alt="Logo Tec">
    </div>
    <div class="login">

        <form action="/" class="form" method="post">
            <label class="title">Iniciar Sesión</label>

            <?php include_once __DIR__ . "/../templates/alerts.php" ?>
            <div class="field">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" name="email">
            </div>
            <div class="field">
                <label for="password">Contraseña:</label>
                <input type="password" name="password">
            </div>

            <div class="center">
                <input type="submit" class="button with-100" value="Iniciar Sesión">
            </div>

        </form>
    </div>
</main>