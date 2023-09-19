<?php

interface SalaInterface {
  public function getNumero();
  public function getCapacidade();
}

class Sala implements SalaInterface {
    public $numero;
    public $capacidade;

    public function __construct($numero, $capacidade) {
      $this->numero = $numero;
      $this->capacidade = $capacidade;
    }
  
    public function getNumero() {
      return $this->numero;
    }
  
    public function getCapacidade() {
      return $this->capacidade;
    }
}

abstract class Ingresso {
  public $valor;

  public function __construct($valor = 0) {
    $this->valor = $valor;
  }

  public function getValor() {
    return $this->valor;
  }

  abstract public function imprimeTipo();
}

class Sessao {
    public $sala;
    public $ingressos = array();
    public $filme;
    public $horario;
  
    public function __construct(Sala $sala, $filme, $horario) {
      $this->sala = $sala;
      $this->filme = $filme;
      $this->horario = $horario;
    }
  
    public function adicionaIngresso(Ingresso $ingresso) {
      if (count($this->ingressos) >= $this->sala->getCapacidade()) {
        echo "Não é possível adicionar mais ingressos a esta sessão <br><br>";
        return;
      }
  
      $this->ingressos[] = $ingresso;
    }
  
    public function imprimeIngressos() {
      echo "<h3>Ingressos da Sessão {$this->sala->getNumero()} - {$this->filme->getTitulo()}: </h3><br><br>";
      foreach ($this->ingressos as $ingresso) {
        $ingresso->imprimeTipo();
        echo "Valor: {$ingresso->getValor()} <br><br>";
      }
    }

    public function getFilme() {
      return $this->filme;
    }

    public function getHorarios() {
      return $this->horario;
    }

    public function getSala() {
      return $this->sala;
    }

    public function imprimeHorarios()
    {
      echo "Filme: {$this->getFilme()->getTitulo()}<br>";
      echo "Horário de Início: {$this->getHorarios()}<br>";
      echo "Sala: {$this->getSala()->getNumero()}<br><br>";
    }

  }

class IngressoInteira extends Ingresso {
  public function imprimeTipo() {
    echo "Ingresso Inteira <br>";
  }
}

class IngressoMeia extends Ingresso {
  public function imprimeTipo() {
    echo "Ingresso Meia <br>";
  }
}

class Cinema {
  public $salas = array();

  public function adicionaSala(SalaInterface $sala) {
    $this->salas[] = $sala;
  }

public function adicionaIngresso(Sessao $sessao, Ingresso $ingresso) {
    $sala = $sessao->getSala();
    $salaNumero = $sala->getNumero();
    foreach ($this->salas as $salaCadastrada) {
      if ($salaCadastrada->getNumero() == $salaNumero) {
        if ($salaCadastrada->getCapacidade() < $sessao->sala->getCapacidade()) {
          echo "Não é possível adicionar mais ingressos a esta sessão <br><br>";
          return;
        }
      }
    }

  $sessao->adicionaIngresso($ingresso);
}

public function imprimeSalas() {
  echo "<h3>Salas do Cinema:</h3><br><br>";
  foreach ($this->salas as $sala) {
    echo "Sala {$sala->getNumero()} - Capacidade: {$sala->getCapacidade()} <br><br>";
  }
}

}

class Filme {
  public $titulo;
  public $duracao;
  public $genero;
  public $classificacao;
  

  public function __construct($titulo, $duracao, $genero, $classificacao) {
      $this->titulo = $titulo;
      $this->duracao = $duracao;
      $this->genero = $genero;
      $this->classificacao = $classificacao;
  }

  public function getTitulo() {
      return $this->titulo;
  }

  public function getDuracao() {
      return $this->duracao;
  }

  public function getGenero() {
      return $this->genero;
  }

  public function getClassificacao() {
      return $this->classificacao;
  }

  public function imprimeFilmes() {
    echo "Título: {$this->getTitulo()}<br>";
    echo "Duração: {$this->getDuracao()}<br>";
    echo "Classificação: {$this->getClassificacao()}<br>";
    echo "Gênero: {$this->getGenero()}<br><br>";
  }
      
  

}

$sala1 = new Sala(1, 10);
$sala2 = new Sala(2, 20);
$sala3 = new Sala(3, 30);

$cinema = new Cinema();

$cinema->adicionaSala($sala1);
$cinema->adicionaSala($sala2);
$cinema->adicionaSala($sala3);

$filme1 = new Filme("Matrix", "1h 36min", "Ação", "14 anos");
$sessao1 = new Sessao($sala1, $filme1, "15:00");

$sessao1->adicionaIngresso(new IngressoInteira(20));
$sessao1->adicionaIngresso(new IngressoMeia(10));

//$sessao1->imprimeIngressos();

$filme2 = new Filme("Interestelar", "2h", "Ação", "14 anos");
$sessao2 = new Sessao($sala2, $filme2, "18:00");

$sessao2->adicionaIngresso(new IngressoInteira(30));
$sessao2->adicionaIngresso(new IngressoMeia(15));

//$sessao2->imprimeIngressos();

$filme3 = new Filme("Jurassic Park", "1h 40min", "Ação", "Livre");
$sessao3 = new Sessao($sala3, $filme3, "20:00");

$sessao3->adicionaIngresso(new IngressoInteira(30));
$sessao3->adicionaIngresso(new IngressoMeia(15));

//$sessao3->imprimeIngressos();

//$cinema->imprimeSalas();

//$filme1->imprimeFilmes();
//$filme2->imprimeFilmes();
//$filme3->imprimeFilmes();

//$sessao1->imprimeHorarios();
//$sessao2->imprimeHorarios();
//$sessao3->imprimeHorarios();
?>
