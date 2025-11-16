<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo $tituloPagina; ?></title>
    <link rel="stylesheet" href="view/style.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $tituloPagina; ?></h1>
        
        <form action="<?php echo $acaoFormulario; ?>" method="POST">
        
            <?php if (isset($piloto['nomePiloto'])): ?>
                <input type="hidden" name="nomeOriginal" value="<?php echo htmlspecialchars($piloto['nomePiloto']); ?>">
            <?php endif; ?>

            <label for="nomePiloto">Nome do Piloto:</label> <input type="text" id="nomePiloto" name="nomePiloto" 
                   value="<?php echo $piloto['nomePiloto'] ?? ''; ?>" 
                   <?php echo isset($piloto['nomePiloto']) ? 'readonly' : 'required'; ?>>
                   <label for="personagem">Personagem:</label> <input type="text" id="personagem" name="personagem" 
                   value="<?php echo $piloto['personagem'] ?? ''; ?>" required>
            
            <label for="kart">Kart:</label> <input type="text" id="kart" name="kart" 
                   value="<?php echo $piloto['kart'] ?? ''; ?>" required>
            
            <label for="numero">Número/Posição:</label> <input type="number" id="numero" name="numero" 
                   value="<?php echo $piloto['numero'] ?? ''; ?>" 
                   <?php echo isset($piloto['nomePiloto']) ? 'readonly' : 'required'; ?>>
                   <button type="submit" class="<?php echo isset($piloto['nomePiloto']) ? 'btn-editar' : ''; ?>">
                <?php echo $botaoFormulario; ?>
            </button>
        </form>
        
        <a href="index.php">
            <button type="button" style="background-color: #6c757d;">Voltar para Listagem</button>
        </a>
    </div>
</body>
</html>