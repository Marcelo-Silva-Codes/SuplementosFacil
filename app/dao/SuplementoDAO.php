<?php

require_once __DIR__ . '/../../config/banco.php';
require_once __DIR__ . '/../models/Suplemento.php';
require_once __DIR__ . '/SuplementoNutrienteDAO.php';
require_once __DIR__ . '/../models/SuplementoNutriente.php';
require_once __DIR__ . '/../models/Nutriente.php';

class SuplementoDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = getConnection();
    }

    // -------------------------------
    //  INSERIR SUPLEMENTO
    // -------------------------------
    public function inserir(Suplemento $s)
    {
       $sql = "INSERT INTO suplemento (
            nome,
            quantidade_total,
            categoria_id,
            forma_apresentacao,
            quantidade_por_porcao,
            quantidade_total_UM,
            quantidade_por_porcao_UM,
            calorias,
            sabor,
            preco,
            img,
            link,
            marca,
            vegano,
            gluten,
            lactose
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
    $s->getNome(),
    $s->getQuantidadeTotal(),
    $s->getCategoriaId(),
    $s->getFormaApresentacao(),
    $s->getQuantidadePorPorcao(),
    $s->getQuantidadeTotalUM(),
    $s->getQuantidadePorPorcaoUM(),
    $s->getCalorias(),
    $s->getSabor(),
    $s->getPreco(),
    $s->getImg(),
    $s->getMarca(),
    $s->isvegano()?1:0,
    $s->isgluten()?1:0,
    $s->islactose()?1:0,
    $s->getLink()
]);
$snDao = new SuplementoNutrienteDAO();
$novoId = $this->conexao->lastInsertId();  // obtém o id gerado pelo auto_increment

if (!empty($_POST['nutrientes'])) {
    foreach ($_POST['nutrientes'] as $nutrienteId) {
        $quantidade = $_POST["qtd_$nutrienteId"];
        $unidade    = $_POST["un_$nutrienteId"];
        // chamar DAO para inserir na tabela intermediária:
        $snDao->inserirRelacao($novoId, $nutrienteId, $quantidade, $unidade);
    }
}


    }

    // -------------------------------
    //  BUSCAR POR ID
    // -------------------------------
    public function buscarPorId(int $id)
{
    $sql = "SELECT * FROM suplemento WHERE id = ?";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute([$id]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        return null;
    }

    $s = new Suplemento();
    $s->setId((int)$row['id']);
    $s->setNome($row['nome']);
    $s->setQuantidadeTotal($row['quantidade_total']);
    $s->setQuantidadeTotalUM($row['quantidade_total_UM']);
    $s->setQuantidadePorPorcao($row['quantidade_por_porcao']);
    $s->setQuantidadePorPorcaoUM($row['quantidade_por_porcao_UM']);
    $s->setCalorias($row['calorias']);
    $s->setSabor($row['sabor']);
    $s->setCategoriaId((int)$row['categoria_id']);
    $s->setFormaApresentacao($row['forma_apresentacao']);
    $s->setPreco((float)$row['preco']);
    $s->setImg($row['img']);
    $s->setMarca($row['marca']);
    $s->setVegano((bool)$row['vegano']);
    $s->setGluten((bool)$row['gluten']);
    $s->setLactose((bool)$row['lactose']);
    $s->setLink($row['link']);
    
    

    return $s;
}
 public function listarTodos(): array
{
    $sql = "SELECT * FROM suplemento ORDER BY nome ASC";
    $stmt = $this->conexao->query($sql);

    $lista = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $s = new Suplemento();
        $s->setId((int)$row['id']);
        $s->setNome($row['nome']);
        $s->setQuantidadeTotal($row['quantidade_total']);
        $s->setQuantidadeTotalUM($row['quantidade_total_UM']);
        $s->setQuantidadePorPorcao($row['quantidade_por_porcao']);
        $s->setQuantidadePorPorcaoUM($row['quantidade_por_porcao_UM']);
        $s->setCalorias($row['calorias']);
        $s->setSabor($row['sabor']);
        $s->setCategoriaId((int)$row['categoria_id']);
        $s->setFormaApresentacao($row['forma_apresentacao']);
        $s->setPreco((float)$row['preco']);
        $s->setImg($row['img']);
        $s->setMarca($row['marca']);
        $s->setVegano((bool)$row['vegano']);
        $s->setGluten((bool)$row['gluten']);
        $s->setLactose((bool)$row['lactose']);
        $s->setLink($row['link']);
        $lista[] = $s;
    }
    return $lista;
}

 public function listarTodosTUDO(): array
{
    $sql = "SELECT s.* , sn.*, n.* FROM suplemento as s
            join suplemento_nutriente as sn on (s.id = sn_id)
            join nutriente as n on (sn.nutriente_id = n.id)
             ORDER BY s.nome ASC";
    $stmt = $this->conexao->query($sql);

    $lista = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $s = new Suplemento();
        $s->setId((int)$row['id']);
        $s->setNome($row['nome']);
        $s->setQuantidadeTotal($row['quantidade_total']);
        $s->setQuantidadeTotalUM($row['quantidade_total_UM']);
        $s->setQuantidadePorPorcao($row['quantidade_por_porcao']);
        $s->setQuantidadePorPorcaoUM($row['quantidade_por_porcao_UM']);
        $s->setCalorias($row['calorias']);
        $s->setSabor($row['sabor']);
        $s->setCategoriaId((int)$row['categoria_id']);
        $s->setFormaApresentacao($row['forma_apresentacao']);
        $s->setPreco((float)$row['preco']);
        $s->setImg($row['img']);
        $s->setMarca($row['marca']);
        $s->setVegano((bool)$row['vegano']);
        $s->setGluten((bool)$row['gluten']);
        $s->setLactose((bool)$row['lactose']);
        $s->setLink($row['link']);
        $lista[] = $s;
    }
    return $lista;
}


 public function atualizar(Suplemento $s)
{
    $sql = "UPDATE suplemento SET
                nome = ?,
                quantidade_total = ?,
                quantidade_total_UM = ?,
                quantidade_por_porcao = ?,
                quantidade_por_porcao_UM = ?,
                calorias = ?,
                sabor = ?,
                categoria_id = ?,
                forma_apresentacao = ?,
                preco = ?,
                img = ?,
                link = ?,
                marca = ?,
                vegano = ?,
                gluten = ?,
                lactose = ?                
            WHERE id = ?";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute([
        $s->getNome(),
        $s->getQuantidadeTotal(),
        $s->getQuantidadeTotalUM(),
        $s->getQuantidadePorPorcao(),
        $s->getQuantidadePorPorcaoUM(),
        $s->getCalorias(),
        $s->getSabor(),
        $s->getCategoriaId(),
        $s->getFormaApresentacao(),
        $s->getPreco(),
        $s->getImg(),
        $s->getLink(),
        $s->getMarca(),
        $s->isvegano()    ? 1 : 0,
        $s->isgluten()   ? 1 : 0,
        $s->islactose()  ? 1 : 0,
        $s->getId()
       
    ]);
}

    // -------------------------------
    //  DELETAR
    // -------------------------------
    public function deletar(int $id)
    {
        $sql = "DELETE FROM suplemento WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }
}
