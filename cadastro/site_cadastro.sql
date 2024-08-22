CREATE database site_cadastro;

use site_cadastro;

CREATE TABLE site (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(200) not null,
    rg VARCHAR(20) not null,
    cpf VARCHAR(20) not null,
    senha VARCHAR(8) not null,
    data_expedicao date not null
); 

