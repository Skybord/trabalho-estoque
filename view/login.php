<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Controle de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="card p-4 shadow" style="width: 350px;">
        <h3 class="text-center mb-4">Acesso ao Estoque</h3>
        
        <form action="../controller/login_controller.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Usuário</label>
                <input type="text" name="login" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>

        <?php if(isset($_GET['erro'])): ?>
            <div class="alert alert-danger mt-3 text-center p-2">
                Usuário ou senha inválidos!
            </div>
        <?php endif; ?>
    </div>

</body>
</html>