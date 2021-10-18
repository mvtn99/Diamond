<?php

function priceFormat($price)
{
    return number_format((float)$price, 2, '.', '');
}
