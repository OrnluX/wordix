# 🎮 Wordix - Juego de consola en PHP

> Trabajo Final - Programación Estática y Laboratorio Web  
> Tecnicatura Universitaria en Desarrollo Web - UNCo

Wordix es un juego de adivinanza de palabras inspirado en Wordle. Está completamente desarrollado en PHP y pensado para ejecutarse en consola.  
El objetivo es adivinar una palabra de 5 letras en hasta 6 intentos.

---

## 🚀 ¿Cómo jugar?

### ✅ Requisitos previos

Debés tener instalado PHP en tu sistema.  
Podés verificarlo con:

```bash
php -v
```

### ▶️ Ejecutar el juego

Abrí una terminal, navegá hasta el proyecto y ejecutá:

```bash
php VillegasTarquini.php
```

---

## 🧠 ¿Cómo funciona Wordix?

El juego muestra un menú con distintas opciones:

- Jugar con una palabra ingresada
- Jugar con una palabra aleatoria
- Ver una partida específica
- Ver estadísticas del jugador
- Buscar la primera partida ganada

Durante la partida, el jugador tiene 6 intentos para adivinar la palabra.  
El sistema indica si cada letra es:

🟩 Correcta y en la posición correcta  
🟨 Correcta pero en otra posición  
⬜ No está en la palabra

---

## 📁 Estructura del código

- `VillegasTarquini.php`: flujo principal del juego
- `wordix.php`: funciones del motor del juego (intentos, teclado, puntaje)
- `funcionesMenu.php`: opciones del menú y lógica de navegación
- `DisenioEstructurasVillegasTarquini.pdf`: documentación del diseño
- `README.md`: este archivo

---

## 🔄 Diagrama del flujo de juego

![Flujo de juego Wordix](./diagram-wordix.png)

---

## 👨‍💻 Autores

- **Agustín Villegas**  
  Legajo 4366  
  maximiliano.villegas@est.fi.uncoma.edu.ar  
  GitHub: [Villegas7](https://github.com/Villegas7)

- **Sergio Iván Tarquini**  
  Legajo 4461  
  ivan.tarquini@est.fi.uncoma.edu.ar  
  GitHub: [OrnluX](https://github.com/OrnluX)

---

## 🏫 Materia

**Introducción a la programación (2023)**  
Facultad de Informática - Universidad Nacional del Comahue



