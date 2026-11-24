<?php
/**
 * money.php — Utilitários de preço para ST Motors
 * Inclua onde precisar: require_once __DIR__ . '/../includes/money.php';
 */

/**
 * Converte qualquer formato de preço para float limpo.
 * Aceita: "1.000,00" | "1000.00" | "60000" | 60000.00
 */
function precoToFloat($valor): float {
    if (is_float($valor) || is_int($valor)) return (float)$valor;

    $str = (string)$valor;

    // Remove prefixo de moeda e espaços (a máscara do front gera "R$ 3.500,00").
    $str = trim(str_replace(['R$', "\xc2\xa0" /* NBSP */], '', $str));

    // Formato BR com vírgula decimal: "1.000,00" → "1000.00"
    if (preg_match('/^\d{1,3}(\.\d{3})*(,\d{1,2})?$/', $str)) {
        $str = str_replace('.', '', $str); // remove separador de milhar
        $str = str_replace(',', '.', $str); // vírgula → ponto decimal
        return (float)$str;
    }

    // Formato com ponto decimal (já float): "60000.00"
    return (float)str_replace(',', '', $str);
}

/**
 * Formata float para exibição BR: 60000.00 → "60.000,00"
 */
function precoFormat(float $valor): string {
    return number_format($valor, 2, ',', '.');
}

/**
 * Recebe qualquer formato e já retorna string formatada para exibição.
 */
function precoExibir($valor): string {
    return precoFormat(precoToFloat($valor));
}