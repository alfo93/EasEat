(function() {
    const cartInfo = document.getElementById('cart-info');
    const cart = document.getElementById('cart');


    cartInfo.addEventListener('click', function() {
        cart.classList.toggle('show-cart');
    })
})();


//add items to the cart
(function() {
    const cartBtn = document.querySelectorAll('.btn.btn-secondary.float-right');

    cartBtn.forEach(function(btn) {
        btn.addEventListener('click', function(event) {

            const item = {};

            let name = event.target.parentElement.previousElementSibling.children[0].children[0].textContent;
            let prezzo = event.target.parentElement.previousElementSibling.children[0].nextElementSibling.children[0].textContent;

            item.name = name;
            item.prezzo = prezzo;
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item', 'd-flex', 'justify-content-between', 'text-capitalize', 'my-3');

            cartItem.innerHTML = `<div id="Target" class="cart-item d-flex justify-content-between text-capitalize my-3" style="text-align: justify; text-indent: 12px;">

                                        <div class="item-text">
                                            <p id="cart-item-title" class="font-weight-bold mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                          </svg>${item.name} ${item.prezzo}€</p>
                                            <span id="cart-item-price" class="cart-item-price" class="mb-0" style="display:none;">${item.prezzo}€</span>
                                        </div>
                                            <a href="#" id='cart-item-remove' class="cart-item-remove">
                                            </a>
                                
                                 </div>`;

            //select cart
            const cart = document.getElementById('cart');
            const total = document.querySelector('.cart-total-container');



            cart.insertBefore(cartItem, total);

            showTotal();
        });
    });


    //show totals
    function showTotal() {
        const total = [];
        const items = document.querySelectorAll('.cart-item-price');

        items.forEach(function(item) {
            total.push(parseFloat(item.textContent));
        });

        const totalMoney = total.reduce(function(total, item) {
            total += item;
            return total
        }, 0)

        //to show correct float
        const finalMoney = totalMoney.toFixed(2);

        document.getElementById('cart-total').textContent = finalMoney + '€';
        document.querySelector('.Totale').textContent = 'Totale' + '\t' + finalMoney + '€';
        document.getElementById('item-count').textContent = total.length;
    }
})();

function displayMessage() {
    var p = document.getElementById("paragraph");
    p.style.display = "block"; 

    setTimeout(function(){
        document.getElementById("paragraph").style.display = "none"; 
    }, 3000);
}

//delete element from cart
function removeAllElement(elementId)
{
    //Removes an element from the document

    let element = document.getElementById("cart");
    while (element.firstChild.id != 'noTarget') {
        element.removeChild(element.firstChild);
    }

    document.getElementById('cart-total').textContent = 0 + '.00' + ' ' + '€';
    document.querySelector('.Totale').textContent = 'Totale' + ' ' + 0 + '.00' + '€';
    document.getElementById('item-count').textContent = 0;
}

