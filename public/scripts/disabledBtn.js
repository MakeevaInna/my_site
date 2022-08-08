function disabledBtn()
{
    document.getElementById('cart-button').disabled = true;
}
document.getElementById('cart-form').onsubmit = disabledBtn;