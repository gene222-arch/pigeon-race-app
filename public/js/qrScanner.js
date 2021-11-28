const btnScanner = document.querySelector('.btn-scanner');
const videoElem = document.querySelector('.qr-scanner');


const qrScanner = new window.QrScanner(videoElem, (result) => {
    if (result) {
        console.log('decoded qr code:', result);
    
        qrScanner.stop();
    }
});

const handleScanning = async () => 
{
    try {
        const hasCamera = await window.QrScanner.hasCamera();

        console.log(hasCamera);

        if (! hasCamera) {
            alert('Web camera does not exists');
        }

        if (hasCamera) {
            qrScanner.start();
        }

    } catch (error) {
        console.log(error);
    }
}

btnScanner.addEventListener('click', handleScanning);