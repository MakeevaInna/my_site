const products = async() => {
    const response = await fetch('http://mysite.loc:8080/api/products', {
        method: 'GET',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    })
    const content = await response.json();
    const elements = document.getElementById("product");
    for (let key in content) {
        elements.innerHTML += `
            <div class="products-category-1">
                <a href="/${content[key].code}"><img src="/${content[key].img}" alt="${content[key].title}"></a>
                <a href="/${content[key].code}"><h5>${content[key].title}</h5></a>
                <p>${content[key].price} грн.</p>
                <a href="/cart/add/${content[key].code}" data-id="${content[key].code}">Купити
                </a>
            </div>
        `
    }
}
products();
