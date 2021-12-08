function setEditID(id) {
    localStorage.setItem('orderID', id);
    document.cookie = "edit_id=" + id;
}

function getEditID() {
    return localStorage.getItem('orderID');
}

async function loadProducts() {
    // convert xml file to string
    const xmlProductsFile = await fetch('http://localhost:9000/products.xml');
    const productsString = await xmlProductsFile.text();
    // pass it to the parser
    let parser = new DOMParser();
    let parsedXMLProducts = parser.parseFromString(productsString, "text/xml");
    let products = parsedXMLProducts.getElementsByTagName("product");
    console.log(products[0].childNodes);
    // text nodes are inserted between the child nodes
    // so check with the console to make sure the index
    // points to what you want
    // console.log(products[0].childNodes[3].textContent); // name of first product
    return products;
}

async function updateProductInfo() {
    // get products
    let products = await loadProducts();
    let productDropdown = document.getElementById("product-dropdown");
    // product dropdown
    let selectedProduct = productDropdown.options[productDropdown.selectedIndex].text;
    // price
    let priceIndex;
    for (i = 0; i < products.length; i++) {
        if (selectedProduct == products[i].childNodes[3].textContent) {
            priceIndex = i;
        }
    }
    let price = products[priceIndex].childNodes[5].textContent;
    document.getElementById("product-price").innerText = price;
    // quantity
    let quantity = document.getElementById("product-quantity").value;
    console.log(quantity);
    // item total
    document.getElementById("item-total").innerText = price * quantity;
    // number of items
    // discount
    // subtotal
    // delivery
    // tax
    // total
    // amount paid
    // outstanding
    // fulfillment
}
  
// const form = document.getElementById('form');
// form.addEventListener('submit', updateOrdersXML);

// async function updateOrdersXML(event) {
//     console.log('hello');
//     event.preventDefault();
//     // convert xml file to string
//     const xmlProductsFile = await fetch('http://localhost:9000/orders.xml');
//     const productsString = await xmlProductsFile.text();
//     // pass it to the parser
//     let parser = new DOMParser();
//     let parsedXMLOrders = parser.parseFromString(productsString, "text/xml");

//     let orders = parsedXMLOrders.getElementsByTagName("order");
//     console.log(orders);
//     let ids = parsedXMLOrders.getElementsByTagName("id");
//     let currentOrderID = getEditID();
//     let currentOrder;
//     for(i = 0; i<orders.length; i++) {
//         if (orders[i].childNodes[1].textContent==currentOrderID) {
//             currentOrder = orders[i];
//         }
//     }

//     console.log(currentOrder);
//     let currentItems = currentOrder.childNodes[13];
//     while (currentItems.firstChild) {
//         currentItems.removeChild(currentItems.lastChild);
//     }
//     console.log(currentItems);
//     // 1-id, 3-date, 5-customer, 7-payment, 9-fulfillment, 11-total, 13-items
//     // 15-delivery
// }
