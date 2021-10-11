{include 'templates/header.tpl'}
<div class="container">
    <h1>{$titulo}</h1>
    <form action="verify" method="POST">
        <div>
            <label>Usuario (email)</label>
            <input type="email" name="email" placeholder="Ingrese email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>

        </div>
        <h4 class="alert-danger">{$error}</h4>
        <button type="submit">Login</button>
    </form>

</div>
{include 'templates/footer.tpl'}