<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Ambil nilai dari form
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	// Buat header email
	$headers = "From: $email\r\n";
	$headers .= "Reply-To: $email\r\n";
	$headers .= "Content-type: text/html\r\n";

	// Alamat email penerima
	$to = "tujuan@example.com";

	// Kirim email
	if (mail($to, $subject, $message, $headers)) {
		// Jika email berhasil dikirim, tampilkan pesan sukses
		echo "<p>Pesan Anda telah terkirim.</p>";
	} else {
		// Jika email gagal dikirim, tampilkan pesan error
		echo "<p>Gagal mengirim pesan. Silakan coba lagi nanti.</p>";
	}
}
?>
