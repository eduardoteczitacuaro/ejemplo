# Programa de cálculo del área de un rectángulo

# Este programa solicita al usuario que ingrese su nombre, edad, base y altura del rectángulo.
# Luego, calcula y muestra el área del rectángulo ingresado, así como otras informaciones relacionadas.

# Imprimir encabezado
print("Bienvenido al Programa de Cálculo del Área de un Rectángulo")
print("Ejercicio No. 1 ---solicitar variables---- ")
print("-------------------------------------------------------")

# Variables y tipos de datos

# Asignación de valores a variables
nombre = input("Ingresa tu nombre: ")
edad = int(input("Ingresa tu edad: "))
altura = 1.75
es_estudiante = True

# Imprimir el contenido de las variables
print("Mi nombre es", nombre)
print("Tengo", edad, "años")
print("Mi altura es", altura, "metros")
print("¿Soy estudiante?", es_estudiante)

# Estructuras de control: condicionales

if edad >= 18:  # Si la edad es mayor o igual a 18
    print("Soy mayor de edad")
else:
    print("Soy menor de edad")

# Estructuras de control: bucles

# Bucle while
contador = 0
while contador < 5:
    print("El contador es", contador)
    contador += 1

# Bucle for
frutas = ["manzana", "banana", "cereza"]
for fruta in frutas:
    print("Me gusta comer", fruta)


# Funciones

# Definición de una función
def calcular_area_rectangulo(base, altura):
    area = base * altura
    return area

# Llamada a la función

base_rectangulo = int(input("Ingresa base del rectángulo: "))
altura_rectangulo = int(input("Ingresa altura del rectángulo: "))
area_rectangulo = calcular_area_rectangulo(base_rectangulo, altura_rectangulo)
print("El área del rectángulo es:", area_rectangulo)
A = 12
B = 23
Area2 = calcular_area_rectangulo(A, B)
print("El área del rectángulo es:", Area2)

# Módulos

# Importar el módulo math
import math

# Utilizar una función del módulo math
raiz_cuadrada = math.sqrt(25)
print("La raíz cuadrada de 25 es:", raiz_cuadrada)
