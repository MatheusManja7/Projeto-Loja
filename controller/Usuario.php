<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto-Loja/model/Database.php';

class Usuario{

    public int $id_usuario;
    public string $nome;
    public string $email;
    public string $telefone;

    public function cadastrar()
    {
        $db = new Database('Usuario');

        $res = $db->insert(
                [
                    'nome' => $this->nome,
                    'email' => $this->email,
                    'telefone' => $this->telefone,
                ]
            );

        return $res;
    }

    public function buscar($where = null, $order = null, $limit = null)
    {
        $db = new Database('Usuario');

        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function buscar_por_id($id_usuario){
        $db = new Database('Usuario');
        $where = 'id_usuario ='.$id_usuario;
        $res = $db->select($where)->fetchObject(self::class);
        return $res;
    }

    public function atualizar(){
        $db = new Database('Usuario');
        $res = $db->update('id_usuario ='.$this->id_usuario,
            [
                "nome" => $this->nome,
                "email" => $this->email,
                "telefone" => $this->telefone,
            ]
        );
        return $res;
    }

    public function buscar_compras($id_usuario) {
        $db = new Database();
        $query = "SELECT Compras.id_compra, Compras.quantidade, Compras.data_compra, 
                         Produto.nome AS produto_nome 
                  FROM Compras 
                  INNER JOIN Produto ON Compras.id_produto = Produto.id_produto 
                  WHERE Compras.id_usuario = :id_usuario";
        $stmt = $db->execute($query, [':id_usuario' => $id_usuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    


    public function excluir($id){
        $db = new Database('Usuario');
        $where = 'id_usuario = ' . intval($id);
        return $db->delete($where);
    }
    
}

?>