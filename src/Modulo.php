<?php
declare(strict_types=1);

/** Monta parâmetros; não realiza chamadas de rede. */
function prepararConsulta(array $args): array
{
    if (($args[0] ?? '')!=='profissao') throw new InvalidArgumentException('Use profissao "TERMO_DA_PROFISSAO".');
    $profissao=trim($args[1] ?? '');
    if (strlen($profissao)<2 || strlen($profissao)>120 || preg_match('/[\x00-\x1F\x7F]/',$profissao)) throw new InvalidArgumentException('Use um termo de dois a 120 bytes, sem caracteres de controle.');
    return ['profissao',['profissao'=>$profissao]];
}
