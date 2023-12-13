function up(menuID, max) {
    var inputElement = document.getElementById("myNumber" + menuID);
    inputElement.value = parseInt(inputElement.value) + 1;

    // Update total harga
    updateTotalPrice(menuID);
}

function down(menuID, min) {
    var inputElement = document.getElementById("myNumber" + menuID);
    inputElement.value = parseInt(inputElement.value) - 1;

    // Update total harga
    updateTotalPrice(menuID);
}

function updateTotalPrice(menuID) {
    var inputElement = document.getElementById("myNumber" + menuID);
    var priceElement = document.getElementById("totalPrice" + menuID);
    var totalPrice = parseInt(inputElement.value); // Langsung ambil jumlah item

    // Tampilkan total harga tanpa format khusus
    priceElement.innerText = totalPrice;
}