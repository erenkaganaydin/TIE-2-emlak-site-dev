<?php include "ortak/header.php"; ?>

<body class="maxw1600 m0a dashboard-bd">
<!-- Wrapper -->
<div id="wrapper" class="int_main_wraapper">
    <?php include "ortak/navbars.php"; ?>
    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2"
         style="padding-right: 0">
        <div class="my-properties">
            <table class="table-responsive">
                <thead>
                <tr>
                    <th class="pl-2">İlanlar</th>
                    <th class="p-0"></th>
                    <th>Ekleme Tarihi</th>
                    <th>Görüntüleme</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody id="ilanlarr">
                </tbody>
            </table>

        </div>
    </div>

    <?php include "ortak/footer.php"; ?>

    <script>
        $(document).ready(function () {
            bilgileriGetir();
        });

        function bilgileriGetir() {
            $('#ilanlarr').html('');
            $.ajax({
                type: 'POST',
                url: './php/ilanlar.php',
                data: {tumu: true}, // Send the 'listele' parameter to indicate fetching data
                dataType: 'json', // Assuming your API returns JSON
                success: function (response) {
                    if (response.success) {
                        if (response.success) {
                            for (var i = 0 ; i < response.data.length ; i++ )
                            {
                                var newRow = '<tr>' +
                                    '<td class="image myelist"><a href="./edit-propery.php?id=' + response.data[i].ilan_id + '"><img alt="' + response.data[i].resim_path + '" src="' + response.data[i].resim_path + '" class="img-fluid"></a></td>' +
                                    '<td><div class="inner"><a href="./edit-propery.php?id=' + response.data[i].ilan_id + '"><h2>' + response.data[i].baslik + '</h2></a>' +
                                    '<figure><i class="lni-map-marker"></i>' + response.data[i].address + '</figure>' +
                                    '<div class="starts text-left mb-0"><p>' + response.data[i].ilan_durumu + ' - ' + response.data[i].ilan_tipi + ' - ' + response.data[i].oda_sayisi + ' Oda</p></div></div></td>' +
                                    '<td>' + response.data[i].tarih + '</td>' +
                                    '<td>' + response.data[i].goruntulenme + '</td>' +
                                    '<td class="actions"><a href="./edit-propery.php?id=' + response.data[i].ilan_id + '" class="edit"><i class="lni-pencil"></i>Düzenle</a>' +
                                    '<a href="#" class="delete" data-ilan-id="' + response.data[i].ilan_id + '"><i class="far fa-trash-alt"></i></a></td></tr>';

                                // Oluşturulan satırı tabloya ekleyin
                                $('#ilanlarr').append(newRow);
                            }
                            // Verileri içeren HTML satırını oluştur


                        } else {
                            // Handle the case where no data is found
                            console.log('No data found');
                        }
                    }
                },
                error: function (error) {
                    console.log('Error fetching data: ' + error.responseText);
                }
            });
        }
    </script>
    <script>
        // Silme butonuna tıklanınca
        $('#ilanlarr').on('click', '.delete', function () {
            var ilanId = $(this).data('ilan-id');

            // Kullanıcıya onay mesajı göster
            var confirmDelete = confirm('İlanı silmek istediğinizden emin misiniz?');

            // Eğer kullanıcı "Evet" derse
            if (confirmDelete) {
                // AJAX isteği göndererek ilanı sil
                $.ajax({
                    type: 'POST',
                    url: './php/sil-ilan.php', // Silme işlemini gerçekleştiren PHP dosyasının yolu
                    data: { ilan_id: ilanId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Silme başarılı ise tabloyu güncelle
                            bilgileriGetir();
                            alert('İlan başarıyla silindi.');
                        } else {
                            alert('İlan silinirken bir hata oluştu.');
                        }
                    },
                    error: function (error) {
                        console.log('Error deleting data: ' + error.responseText);
                    }
                });
            }
        });
    </script>