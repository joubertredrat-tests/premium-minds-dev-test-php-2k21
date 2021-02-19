# Desafio Premium Minds

#### Dependências

* Docker
* Docker compose

#### Execução

* Fazer clone deste repositório e executar `docker-composer up -d`.
* Executar o comando onde será mostrado as regras `docker exec -it premium-minds-pokemon-php bin/console`.
* Para executar o game, basta executar `docker exec -it premium-minds-pokemon-php bin/console pokemon:capturar --casas [CASAS]` de acordo com os exemplos do comando acima.

#### Coverage

* Para visualizar os testes e coverage, basta executar `docker exec -it premium-minds-pokemon-php php composer.phar run coverage`.