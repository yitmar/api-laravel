<?php
// realizando o autoload das bibliotecas
require_once 'vendor/autoload.php';
// instanciando o gerador de fakes
$faker = Faker\Factory::create();
// gerando um nome fake (o PHP_EOL é apenas para pular a linha antes do echo do próximo comando)
echo $faker->name . PHP_EOL;
// gerando um número de um digito aleatório
echo $faker->randomDigit . PHP_EOL;
// gerando uma extensão de arquivo aleatório
echo $faker->fileExtension . PHP_EOL;