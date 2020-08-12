CREATE TABLE usuario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(45) NOT NULL ,
    senha VARCHAR(32) NOT NULL,
    permissao INT
);

CREATE TABLE cliente(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL,
    ip VARCHAR(15),
    concentrador VARCHAR(45),
    vlan INT,
    pppoe VARCHAR(45) NOT NULL,
    senha VARCHAR(45),
    stcontrato VARCHAR(45),
    servico VARCHAR(45),
    velocidade VARCHAR(45),
    status VARCHAR(45),
    anotacoes VARCHAR(500)
);

CREATE TABLE log(
  id INT AUTO_INCREMENT PRIMARY KEY,
  data VARCHAR(45),
  log VARCHAR(45),
  cliente_id INT,
  FOREIGN KEY (cliente_id) REFERENCES cliente (id)
);

CREATE TABLE autenticacao(
    id INT PRIMARY KEY AUTO_INCREMENT,
    concentrador VARCHAR(45),
    inicio VARCHAR(45),
    termino VARCHAR(45),
    trafegoupload VARCHAR(45),
    trafegodownload VARCHAR(45),
    movitodesconexao VARCHAR(45),
    ipconexao VARCHAR(15),
    ipconcentrador VARCHAR(15),
    ipv6 VARCHAR(40),
    mac VARCHAR(17),
    cliente_id INT,
    FOREIGN KEY (cliente_id) REFERENCES cliente (id)
);