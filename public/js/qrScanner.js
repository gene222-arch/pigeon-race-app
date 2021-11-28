import * as DEVICE from './utils/device.js'

window.addEventListener('load', () =>
{
    const qrForm = document.querySelector('.form-qr-upload');
    const btnScanner = document.querySelector('.btn-scanner');
    const videoElem = document.querySelector('.qr-scanner');
    const featured = document.querySelector('.featured');

    !DEVICE.isDesktop() ? btnScanner.style.display = 'none' : qrForm.style.display = 'none';

    if (! DEVICE.isDesktop()) 
    {
        qrForm.addEventListener('change', () => 
        {
            const inputQr = document.querySelector('.input-qr-code');
            const file = inputQr.files[0];

            var reader = new FileReader();

            reader.readAsDataURL(file);

            reader.onload = (e) =>
            {
                window.QrScanner
                    .scanImage(e.target.result)
                    .then(result => console.log(result))
                    .catch(error => console.log(error || 'No QR code found.'));
            };
        })
    }

    const qrScanner = new window.QrScanner(videoElem, (result) => 
    {
        if (result) 
        {
            console.log('decoded qr code:', result);
            qrScanner.stop();
        }
    });

    const handleScanning = async () => 
    {
        try {
            const hasCamera = await window.QrScanner.hasCamera();

            featured.style.display = 'none';
            videoElem.style.width = '100%';

            if (hasCamera) {
                qrScanner.start();
            }

        } catch (error) {
            console.log(error);
        }
    }

btnScanner.addEventListener('click', handleScanning);
})