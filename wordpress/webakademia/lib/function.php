<?php

function dump($data)
{
    echo "<pre>";
        print_r($data);
    echo "</pre>";
}

function getForm($currencyCodeArray,$currencyCodeDateArray): string
{
    $currency = sanitize_text_field($_GET['currency']);
    $date = sanitize_text_field($_GET['date']);
    $pln = floatval(sanitize_text_field($_GET['pln']));

    $form = '<form name="currency-form">';
    $form .= '<input name="pln" value="'.$pln.'" /> <br>';
    $form .= getSelect('currency','currency',$currencyCodeArray,$currency);
    $form .= getSelect('date','date',$currencyCodeDateArray,$date);
    $form .= '<input type="submit" name="submit" value="Przelicz" />';
    $form .= '</input>';
    return $form;
}

function getSelect(string $id,string $name,array $options = array(), string $value): string
{
    $select = '<select name="'.$name.'" id="'.$id.'">';
    foreach ($options as $key => $val)
    {
        if($value == $key)
        {
            $selected ='selected="selected"';
        } else {
            $selected = "";
        }
        $select .= '<option '.$selected.' value="'.$key.'">'.$val.'</option>';
    }
    $select .= '</select>';
    return $select;
}
