
function cellphone(){
    console.log("eee")
    const cellphones = [
        "Iphone 15",
        "Samsung Galaxy Z Flip5",
        "Samsung Galaxy Z Fold5",
        "Samsung Galaxy S21",
        "Redmi Note 12",
        "Nokia 3310",
        "Barbie Toy Cellphone",
        "Nokia 6150",
        "Iphone 6s",
        "Nokia 6111",
        "Oppo Find X6",
        "Vivo Y20",
        "Cherry Mobile Aqua S10",
        "Ben10 Toy Cellphone",
        "Sony Xperia 1 III",
        "Blackberry",
        "Huawei Nova Y70",
        "Huawei Mate 50",
        "LG Stylo 3",
        "OnePlus 11"
    ];
    const cellphone_prices = [49990, 64990, 98990, 26990, 10690, 490, 99, 490, 3490, 849, 53300, 8490, 3900, 149, 39890, 4990, 9990, 52990, 8490, 9990];
    for (let i = 0; i < cellphones.length; i++) {
        const cellphoneName = cellphones[i];
        const price = cellphone_prices[i];
        document.write(`
            <div class="col-md-3">
                <div>
                    <img src='uploads/cell_phone/${i + 1}.jpg' data-toggle="tooltip" data-placement="center" title="${cellphoneName}+" width="140" height="150" alt="${cellphoneName}">
                    <div>
                        <input type="checkbox" name="check_${i + 1}" id="check_${i + 1}" onclick="handleItems('${cellphoneName}', '${price}')" class="checkbox-group">
                        <label for="check_${i + 1}">${cellphoneName}(<b>₱ ${price}</b>)</label>
                    </div>
                </div>
            </div>
        `);
    }
    Discount = 0;
    totalQuantity = 0;
    totalDiscount = 0;
    totalDiscounted = 0;
    // Get all checkboxes with the class "checkbox-group"
    var checkboxes = document.querySelectorAll('.checkbox-group');
    // Add an event listener to each checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Uncheck all other checkboxes in the group
            checkboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });
}