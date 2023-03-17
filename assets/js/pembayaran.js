function total() {
    let name = document.getElementById('name').value;
    let quantity = parseInt(document.getElementById('quantity').value);

    console.log(quantity);

    if (name == 'Notes') {
        let price = 20000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else if (name == 'Drinkware') {
        let price = 360000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else if (name == 'Umbrella') {
        let price = 40000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else if (name == 'Custom Mug') {
        let price = 150000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else if (name == 'Custom Bottle') {
        let price = 80000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else if (name == 'Custom Tote Bag') {
        let price = 15000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else if (name == 'Card') {
        let price = 10000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else if (name == 'USB NCHolder') {
        let price = 50000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else if (name == 'Seminar Kit') {
        let price = 200000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else if (name == 'Custom Watch') {
        let price = 300000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else if (name == 'Custom Pouch') {
        let price = 100000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else if (name == 'Custom Merchant') {
        let price = 75000 * quantity;
        document.getElementById("price").setAttribute('value', price);
    } else {
        console.log('error');
    }

    // switch (name) {
    //     case 'Notes':
    //         let price = 20000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     case 'Drinkware':
    //         let price = 360000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     case 'Custom Mug':
    //         let price = 150000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     case 'Umbrella':
    //         let price = 40000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     case 'Custom Bottle':
    //         let price = 80000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     case 'Custom Tote Bag':
    //         let price = 15000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     case 'Card':
    //         let price = 10000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     case 'USB NCHolder':
    //         let price = 50000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     case 'Seminar Kit':
    //         let price = 200000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     case 'Custom Watch':
    //         let price = 300000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     case 'Custom Pouch':
    //         let price = 100000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     case 'Custom Merchant':
    //         let price = 75000 * quantity;
    //         document.getElementById("price").setAttribute('value', price);
    //         break;
    //     default:
    //         break;
    // }
}