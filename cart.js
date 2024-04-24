document.addEventListener("DOMContentLoaded", function () {
  const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
  addToCartButtons.forEach((button) => {
    button.addEventListener("click", function () {
      let productId = button.dataset.productId;
      let name = button.dataset.name;
      let price = button.dataset.price;
      let userId = button.dataset.userId; // Получаем userId из атрибута кнопки
      let quantity = 1; // You can adjust this based on user input
      let imagePath = document
        .querySelector(".product-image")
        .getAttribute("src");
      productId = parseInt(productId);
      userId = parseInt(userId);
      quantity = parseInt(quantity);
      price = parseInt(price);
      console.log(
        `Adding product to cart: <p>Product ID: ${productId} (тип: ${typeof productId})</p>, Name: ${name} (тип: ${typeof name}), Price: ${price} (тип: ${typeof price}), User ID: ${userId} (тип: ${typeof userId}), Quantity: ${quantity} (тип: ${typeof quantity}), Image Path: ${imagePath}`
      );
      addToCart(productId, userId, quantity, price, name, imagePath); // Передаем userId в функцию addToCart
    });
  });

  function addToCart(productId, userId, quantity, price, name, imagePath) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/config/addToCart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Handle success
          console.log("Product added to cart successfully");
        } else {
          // Handle error
          console.error("Failed to add product to cart");
        }
      }
    };

    // Prepare data to send
    const data = new URLSearchParams();
    data.append("productId", productId);
    data.append("userId", userId); // Добавляем userId в данные для отправки
    data.append("quantity", quantity);
    data.append("price", price);
    data.append("name", name);
    data.append("image", imagePath);

    // Send request
    xhr.send(data);
  }
});
