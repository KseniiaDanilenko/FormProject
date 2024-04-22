
    document.addEventListener('DOMContentLoaded', function() {
        const firstnameInput = document.getElementById('firstname');
        const lastnameInput = document.getElementById('lastname');
        const submitButton = document.querySelector('button[type="submit"]');

        // Функция для проверки длины введенных значений
        function checkInputs() {
            const firstnameValue = firstnameInput.value.trim();
            const lastnameValue = lastnameInput.value.trim();

            if (firstnameValue.length >= 2 && lastnameValue.length >= 2) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        // Слушаем изменения в полях firstname и lastname
        firstnameInput.addEventListener('input', checkInputs);
        lastnameInput.addEventListener('input', checkInputs);

        // Проверяем при загрузке страницы
        checkInputs();
    });

