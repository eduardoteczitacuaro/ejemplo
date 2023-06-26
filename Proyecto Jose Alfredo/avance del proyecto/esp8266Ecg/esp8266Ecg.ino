#include <ESP8266WiFi.h>

const char* ssid = "R7";
const char* password = "justapassword";
const char* server_address = "172.31.193.5";

void setup() {
  Serial.begin(9600);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Conectando a la red WiFi...");
  }
  Serial.println("Conexión WiFi establecida.");
}

void loop() {
  // Leer los datos del sensor ECG
  int ecg_data = analogRead(A0);

  // Enviar los datos al servidor PHP
  WiFiClient client;
  if (client.connect(server_address, 80)) {
    String data = "ecg_data=" + String(ecg_data);
    client.println("POST /recibir_datos.php HTTP/1.1");
    client.println("Host: " + String(server_address));
    client.println("Content-Type: application/x-www-form-urlencoded");
    client.println("Content-Length: " + String(data.length()));
    client.println();
    client.println(data);
    delay(100);
  }
  client.stop();

  // Esperar 1 segundo antes de leer el siguiente dato del sensor ECG
  delay(900);
}
