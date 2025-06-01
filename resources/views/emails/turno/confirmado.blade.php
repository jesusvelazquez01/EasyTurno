<x-mail::message>
# ✅ ¡Turno Confirmado!

Hola, te confirmamos que tu turno fue registrado correctamente.  
A continuación, los detalles de tu reserva:

---

### 🗓️ Detalles del Turno

- 📅 **Fecha:** {{ $turno->fecha }}
- 🕒 **Horario:** {{ $turno->entrada }} - {{ $turno->salida }}
- 👨‍🏫 **Profesor:** {{ $turno->profesor }}
- 🖥️ **Sala:** {{ $turno->sala->nombre ?? 'No asignada' }}

---
Gracias por usar nuestro sistema,<br>
**{{ config('app.name') }}**
</x-mail::message>

