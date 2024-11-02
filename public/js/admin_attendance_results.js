document.addEventListener('DOMContentLoaded', () => {
    const selectElement = document.getElementById('tab-select');
    const tabContents = document.querySelectorAll('.tab-content');

    if (selectElement) { 
        const savedValue = localStorage.getItem('selectedTab');
        if (savedValue) {
            selectElement.value = savedValue;
        }

        function showTab(tabId) {
            tabContents.forEach(content => {
                content.style.display = content.id === tabId ? 'block' : 'none';
            });
        }

        selectElement.addEventListener('change', (event) => {
            const selectedValue = event.target.value;
            showTab(selectedValue);

            localStorage.setItem('selectedTab', selectedValue);
        });

        showTab(selectElement.value);
    } else {
        console.error("Không tìm thấy phần tử với id 'tab-select'.");
    }
});
