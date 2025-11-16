<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Pilotos</title>
    <link rel="stylesheet" href="view/style.css">
</head>
<body>
    <div class="container">
        <h1>Lucas Schutz - Pilotos de Kart (MVC)</h1>
        
        <a href="index.php?acao=cadastrar">
            <button type="button" style="width: 100%;">Cadastrar Novo Piloto</button>
        </a>
        
        <hr>
        
        <h2>Pilotos Cadastrados</h2>
        
        <?php if (!empty($pilotos)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th> <th>Nome do Piloto</th> <th>Personagem</th> <th>Kart</th> <th>Número/Posição</th> <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pilotos as $piloto): ?>
                        <tr>
                            <td><?php echo $piloto['id']; ?></td>
                            <td><?php echo htmlspecialchars($piloto['nomePiloto']); ?></td>
                            <td><?php echo htmlspecialchars($piloto['personagem']); ?></td>
                            <td><?php echo htmlspecialchars($piloto['kart']); ?></td>
                            <td><?php echo $piloto['numero']; ?></td>
                            <td>
                                <a class="link-acao" href="index.php?acao=editar&nome=<?php echo urlencode($piloto['nomePiloto']); ?>">
                                    Editar
                                </a>
                                
                                <a class="link-excluir" 
                                   href="index.php?acao=excluir&nome=<?php echo urlencode($piloto['nomePiloto']); ?>" 
                                   onclick="return confirm('Tem certeza que deseja excluir <?php echo htmlspecialchars($piloto['nomePiloto']); ?>?');">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5"><strong>Total de pilotos cadastrados:</strong></td> <td><strong><?php echo $totalPilotos; ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        <?php else: ?>
            <p>Nenhum piloto cadastrado ainda.</p>
        <?php endif; ?>
    </div>
</body>
</html>