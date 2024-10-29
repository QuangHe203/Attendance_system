document.addEventListener('DOMContentLoaded', () => {
    const selectElement = document.getElementById('tab-select');
    const tabContents = document.querySelectorAll('.tab-content');

    if (selectElement) { 
        function showTab(tabId) {
            tabContents.forEach(content => {
                content.style.display = content.id === tabId ? 'block' : 'none';
            });
        }

        selectElement.addEventListener('change', (event) => {
            showTab(event.target.value);
        });

        showTab(selectElement.value);
    } else {
        console.error("Không tìm thấy phần tử với id 'tab-select'.");
    }
});
