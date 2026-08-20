
document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector(".payment-modal form");
    if (!form) return;

    form.addEventListener("submit", () => {

        const orderData = {
            name: document.getElementById("holder")?.value || "",
            email: "customer@email.com",
            total: document.getElementById("side-cart-total")
                ?.innerText.replace("$", "") || 0,
            items: document.getElementById("cart-items")?.innerText || ""
        };

        fetch("save_order.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(orderData)
        });

    });
});

