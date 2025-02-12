<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto-Loja/model/Database.php';

class Produto{

    public int $id_produto;
    public string $nome;
    public string $categoria;
    public string $marca;
    public string $preco;
    public string $qtd_estoque;

    public function cadastrar()
    {
        $db = new Database('produto');

        $res = $db->insert(
                [
                    'nome' => $this->nome,
                    'categoria' => $this->categoria,
                    'marca' => $this->marca,
                    'preco' => $this->preco,
                    'qtd_estoque' => $this->qtd_estoque,
                ]
            );

        return $res;
    }

    public function buscar($where = null, $order = null, $limit = null)
    {
        $db = new Database('produto');

        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function buscar_por_id($id_produto){
        $db = new Database('produto');
        $where = 'id_produto ='.$id_produto;
        $res = $db->select($where)->fetchObject(self::class);
        return $res;
    }

    public function atualizar(){
        $db = new Database('produto');
        $res = $db->update('id_produto ='.$this->id_produto,
            [
                'nome' => $this->nome,
                'categoria' => $this->categoria,
                'marca' => $this->marca,
                'preco' => $this->preco,
                'qtd_estoque' => $this->qtd_estoque,
            ]
        );
        return $res;
    }

    public function excluir($id){
        $db = new Database('Produto');
        $where = 'id_produto = ' . intval($id);
        return $db->delete($where);
    }
}

?>