var prekes = [
    ['Samsung', 'SM-J320FZDDETL', 'Samsung Galaxy J3 (2016) J320F Gold | 5.0" 720x1280 | Quad-core 1.2GHz | 8GB, microSD lizdas | 1,5GB RAM | 8Mp ir 5MP kameros | 4G (LTE), WiFi, BT, GPS | 2600mAh', '120.89', 'http://www.skytech.lt/images/xsmall/70/1645970.png'],
    ['Samsung', 'SM-J320FZKDXEO', 'Samsung Galaxy J3 (2016) | DUAL-SIM | 8 GB | Black | HSDPA | WiFi | 3G | LTE | Screen 5" | 720 x 1280 | RAM 1536 MB | 1xAudio-Out | 1xMicro-USB | 2xMicroSD Card Slot | Camera 8MP | 5MP | Battery 2600 mAh | SM-J320FZKDXEO', '120.89', 'http://www.skytech.lt/images/xsmall/41/954341.png'],
    ['Samsung', 'SM-J730FN GOLD', 'Samsung Galaxy J5 (2017) Blue | Galaxy care | Dual-SIM | 5.2" 720x1280 | Octa-core 1.6GHz E7870 | 16GB atmintis, microSD lizdas | 2GB RAM | 13MP ir 13MP kameros | Fingerprint ID | 4G (LTE), WiFi, BT, GPS, NFC, FM radio | 3000mAh', '229', 'http://www.skytech.lt/images/xsmall/34/1604734.jpg'],
    ['Samsung', 'SM-G930F GOLD', 'Samsung Galaxy S7 Gold | 5.1" 1440x2560 | Octa-core 4x2.3 GHz & 4x1.6 GHz | 32GB atmintis, microSD lizdas | 4GB RAM | 12MP ir 5MP kameros | IP68 | Fingerprint sensor | 4G LTE, WiFi, BT, GPS, NFC', '424', 'http://www.skytech.lt/images/xsmall/28/917428.jpg'],
    ['Samsung', 'SM-G950F ARCTIC SILVER', 'Samsung Galaxy S8 Midnight black | 5.8" 1440x2960 GG5 | Octa-core 4x2.3GHz & 4x1.7GHz | 64GB atmintis, microSD lizdas | 12MP ir 8MP kameros | Iris scanner, Fingerprint ID | IP68 | USB Type-C | 3000mAh', '622.35', 'http://www.skytech.lt/images/xsmall/90/1668490.jpg'],
    ['LG', 'M200N GOLD', 'MOBILE PHONE K8 2017 DUAL/M200E GOLD/BLACK LG', '125.39', 'http://www.skytech.lt/images/xsmall/82/1623582.jpg'],
    ['LG', 'M700AGOLD', 'Smartphone | LG | Q6 | 32 GB | Gold | 3G | LTE | OS Android 7.1 | Screen 5.5" | 1080 x 2160 | IPS-LCD | Dual SIM | 1xMicro-USB | 1xHeadphones jack | 2xNano-SIM card tray | Camera 13MP | 5MP | Battery 3000 mAh | M700AGOLD', '221.49', 'http://www.skytech.lt/images/xsmall/9/1727809.jpg'],
    ['LG', 'H930BLUE', 'LG V30 64GB Blue | 6.0" 2880x1440 P-OLED GG5 | Octa-core 4x2.45GHz & 4x1.9GHz SD835 | 64GB atmintis, microSD lizdas | 4GB RAM | Fingerprint ID | IP68 | DUAL 16MP kamera, 5MP priekinė kamera | USB Type-C | 3300mAh, QuickCharge 3.0', '767', 'http://www.skytech.lt/images/xsmall/59/1726259.jpg'],
    ['LG', 'LG-H870 GOLD', 'LG G6 32GB Gold | 5.7" 1440x2880 | Quad-core 2x2.35GHz, 2x1.6GHz SD821 | 32GB atmintis, microSD lizdas | 4GB RAM | Dual 13MP kamera, 5MP kamera | Fingerprint sensor | IP68 | 4G (LTE), WiFi, BT, GSP, NFC, USB Type-c 1.0 | 3300mAh', '440', 'http://www.skytech.lt/images/xsmall/93/1686893.png'],
    ['Sony', 'G3121PINK', 'MOBILE PHONE XPERIA XA1 LTE/PINK G3121 SONY', '219.35', 'http://www.skytech.lt/images/xsmall/74/1623574.jpg'],
    ['Sony', 'F8331 BLUE', 'Sony Xperia XZ F8331 Blue, 5.2 ", IPS LCD, 1080 x 1920 pixels, Qualcomm Snapdragon, 820, Internal RAM 3 GB, 32 GB, microSD, Single SIM, Nano-SIM, 3G, 4G, Main camera 23 MP, Second camera 13 MP, Android, 6.0.1, 2900 mAh, Warranty 24 month(s)', '385.39', 'http://www.skytech.lt/images/xsmall/84/1471184.png'],
];

var headerPrekes = ['Gamintojas', 'Modelis', 'Aprasymas', 'Kaina', 'Nuotrauka'];
createTable(headerPrekes, prekes);
function createTable(header, data) {
    var table = '';
    table += '<table class="table table-bordered table-hover">';
    table += '<thead>';
    table += '<tr>';
    for(var i=0; i < header.length; i++){
        table += '<th>' + header[i] + '</th>';
    }
    table += '</tr>';
    table += '</thead>';
    table += '<tbody>';
    for(var i=0; i < data.length; i++){
        table += '<tr>';
        for(var j = 0; j < (data[i].length); j++){
            if(j == data[i].length - 1) {
                table += '<td><img src="' + data[i][j] + '" /></td>';
            } else {
                table += '<td>' + data[i][j] + '</td>';
            }
        }
        table += '</tr>';
    }
    table += '</tbody>';
    table += '</table>';

    document.querySelector('.mobile-table').innerHTML = table;
}
