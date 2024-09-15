async function checkFlag() {
    showLoadingBar();
    const flag = document.getElementById('flagInput').value;
    const resultMessage = document.getElementById('resultMessage');

    try {
        // Realizar una solicitud GET al endpoint /check-flag con la flag como parámetro
        const response = await fetch(`https://85.190.240.210:80/check-flag?user_flag=${encodeURIComponent(flag)}`);

        if (response.ok) {
            const result = await response.text();  // Obtener la respuesta como texto

            if (result === "True") {
                resultMessage.innerText = 'Congratulations! You found the correct flag!';
                resultMessage.style.color = 'green';
            } else {
                resultMessage.innerText = 'Sorry, that is not the correct flag. Keep trying!';
                resultMessage.style.color = 'red';
            }
        } else {
            resultMessage.innerText = 'Error: Could not validate the flag.';
            resultMessage.style.color = 'red';
        }
        hideLoadingBar();
    } catch (error) {
        resultMessage.innerText = 'Error: Something went wrong while checking the flag.';
        resultMessage.style.color = 'red';
        console.error('Error:', error);
        hideLoadingBar();
    }
}

async function downloadVPN() {
    showLoadingBar();
    fetch('https://85.190.240.210:5000/generate-ovpn')
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.blob();
        })
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'vpn_config.ovpn';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            hideLoadingBar();
        })
        .catch(error => {
            console.error('There was a problem with the download:', error);
            hideLoadingBar();
        });
}


// Function to show the loading bar
function showLoadingBar() {
    const loadingBarContainer = document.getElementById('loading-bar-container');
    const loadingBar = document.getElementById('loading-bar');
    loadingBarContainer.style.display = 'block';
    loadingBar.style.width = '0';
    setTimeout(() => loadingBar.style.width = '100%', 50);
}

// Function to hide the loading bar
function hideLoadingBar() {
    const loadingBarContainer = document.getElementById('loading-bar-container');
    const loadingBar = document.getElementById('loading-bar');
    loadingBar.style.width = '100%';
    setTimeout(() => loadingBarContainer.style.display = 'none', 500);
}
