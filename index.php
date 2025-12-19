<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Casa del Estudiante - Novus Media Center</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --blue-500: #1565C0;
            --blue-400: #42A5F5;
            --blue-300: #64B5F6;
            --blue-600: #0D47A1;
            --red-500: #E53935;
            --teal-500: #00BFA6;
            --amber-500: #FFB300;
            --bg: #f5f7fb;
            --card: #ffffff;
            --shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
            background: var(--bg);
            padding-top: 76px;
        }

        /* Header y Navegación */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(10, 24, 60, 0.28);
            backdrop-filter: blur(14px);
            z-index: 1000;
            padding: 1rem 0;
            box-shadow: 0 12px 28px rgba(0,0,0,0.18);
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }

        .menu-toggle {
            display: none;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.35);
            background: rgba(255,255,255,0.08);
            color: white;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 6px;
            cursor: pointer;
            transition: transform 0.2s ease, background 0.2s ease, border-color 0.2s ease;
        }

        .menu-toggle span {
            display: block;
            width: 20px;
            height: 2px;
            background: white;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .menu-toggle:hover { transform: translateY(-2px); border-color: rgba(255,255,255,0.6); }

        .menu-toggle.active span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
        .menu-toggle.active span:nth-child(2) { opacity: 0; }
        .menu-toggle.active span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }

        .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .logo::before {
            content: '\f015';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 1rem;
            width: 28px;
            height: 28px;
            border-radius: 10px;
            background: rgba(255,255,255,0.16);
            display: grid;
            place-items: center;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            transition: color 0.25s, transform 0.25s;
            font-weight: 600;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: -6px;
            height: 2px;
            background: white;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.25s ease;
            opacity: 0.7;
        }

        .nav-links a:hover {
            color: #fff;
            transform: translateY(-2px);
        }

        .nav-links a:hover::after {
            transform: scaleX(1);
        }

        /* Hero Section */
        .hero {
            position: relative;
            overflow: hidden;
            background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.08), transparent 35%),
                        radial-gradient(circle at 80% 30%, rgba(255,255,255,0.12), transparent 38%),
                        linear-gradient(135deg, #1565C0 0%, #42A5F5 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 7rem 2rem 4rem;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
            filter: blur(60px);
            top: -80px;
            right: -60px;
            animation: floaty 8s ease-in-out infinite;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .hero .subtitle {
            font-size: 1.2rem;
            margin-bottom: 2.4rem;
            max-width: 800px;
            opacity: 0.96;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.5rem 1rem;
            border-radius: 999px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.3);
            font-weight: 600;
            margin-bottom: 1rem;
            backdrop-filter: blur(4px);
        }

        .video-widget {
            width: 100%;
            max-width: 420px;
            height: 600px;
            background: rgba(0, 0, 0, 0.35);
            border-radius: 22px;
            margin-bottom: 2rem;
            box-shadow: 0 16px 45px rgba(0,0,0,0.32);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.15);
        }

        .video-widget::before {
            content: '\f167';
            font-family: 'Font Awesome 6 Brands';
            font-size: 6rem;
            color: rgba(255,255,255,0.2);
            animation: pulse 2.6s ease-in-out infinite;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.25s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary {
            background: transparent;
            color: white;
            border: 2px solid white;
            box-shadow: 0 10px 25px rgba(255,255,255,0.2);
        }

        .btn-primary:hover {
            background: white;
            color: #1565C0;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #E53935;
            color: white;
            box-shadow: 0 12px 30px rgba(229, 57, 53, 0.35);
        }

        .btn-secondary:hover {
            background: #C62828;
            transform: translateY(-2px) scale(1.01);
        }

        /* Secciones generales */
        section { padding: 5rem 2rem; }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #1565C0;
        }

        /* Sección de Servicios */
        .services { background: #f5f5f5; }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            position: relative;
        }

        .service-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 15px;
            background: linear-gradient(120deg, rgba(21,101,192,0.08), transparent 60%);
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
        }

        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.15);
        }

        .service-card:hover::after { opacity: 1; }

        .service-icon {
            font-size: 3rem;
            color: #1565C0;
            margin-bottom: 1rem;
        }

        .service-card h3 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .service-card p {
            color: #666;
        }

        /* Sección de Preventa */
        .preventa {
            background: white;
        }

        .preventa-subtitle {
            text-align: center;
            font-size: 1.8rem;
            color: #E53935;
            margin-bottom: 3rem;
            font-weight: bold;
        }

        /* Fila A: Aportes */
        .aportes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .aporte-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            border: 2px solid #E0E0E0;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .aporte-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -60%;
            width: 40%;
            height: 100%;
            background: linear-gradient(120deg, rgba(255,255,255,0.65), rgba(255,255,255,0));
            transform: skewX(-15deg);
            opacity: 0;
            transition: opacity 0.3s, left 0.3s;
        }

        .aporte-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .aporte-card:hover::after {
            opacity: 1;
            left: 110%;
        }

        .aporte-card.apoyo {
            background: linear-gradient(135deg, #E53935 0%, #C62828 100%);
            color: white;
            border: none;
        }

        .aporte-price {
            font-size: 2rem;
            font-weight: bold;
            color: #1565C0;
            margin-bottom: 1rem;
        }

        .aporte-card.apoyo .aporte-price {
            color: white;
        }

        .aporte-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .aporte-card.apoyo .aporte-icon {
            color: white;
        }

        /* Fila B: Membresías */
        .membresias-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .membresia-card {
            padding: 2.5rem;
            border-radius: 20px;
            text-align: center;
            color: white;
            box-shadow: 0 14px 40px rgba(0,0,0,0.22);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .membresia-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: rgba(255,255,255,0.3);
        }

        .membresia-card:hover {
            transform: translateY(-10px) scale(1.01);
            box-shadow: 0 18px 46px rgba(0,0,0,0.32);
        }

        .membresia-gold { background: linear-gradient(135deg, #FFB300 0%, #FFA000 100%); }
        .membresia-platinum { background: linear-gradient(135deg, #757575 0%, #424242 100%); }
        .membresia-vip { background: linear-gradient(135deg, #212121 0%, #000000 100%); }

        .membresia-badge {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .membresia-price {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .membresia-features {
            list-style: none;
            margin-bottom: 1.4rem;
        }

        .membresia-features li {
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .membresia-features li:last-child {
            border-bottom: none;
        }

        /* Sección de Depósitos */
        .depositos {
            background: #f5f5f5;
        }

        .depositos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .deposito-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: 1px solid #e8ecf2;
        }

        .deposito-logo {
            font-size: 2rem;
            font-weight: bold;
            color: #1565C0;
            margin-bottom: 1rem;
        }

        .deposito-info {
            margin-top: 1rem;
        }

        .deposito-info p {
            margin: 0.5rem 0;
            color: #666;
        }

        .deposito-info strong {
            color: #333;
            font-size: 1.2rem;
        }

        /* Formulario */
        .registro-form {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-icon {
            font-size: 3rem;
            color: #1565C0;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 1rem;
            border: 2px solid #E0E0E0;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #1565C0;
        }

        .btn-submit {
            width: 100%;
            padding: 1.2rem;
            background: #1565C0;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 12px 28px rgba(21,101,192,0.28);
        }

        .btn-submit:hover {
            background: #0D47A1;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(21, 101, 192, 0.4);
        }

        .chips-inline {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 1rem;
        }

        .chip-pill {
            background: #e3f2fd;
            color: #0D47A1;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .section-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(21,101,192,0.1);
            color: #0D47A1;
            font-weight: 700;
            letter-spacing: 0.2px;
            margin: 0 auto 1rem;
        }

        .highlight-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .highlight-card {
            background: white;
            border-radius: 16px;
            padding: 1.6rem;
            box-shadow: 0 12px 28px rgba(0,0,0,0.08);
            border: 1px solid #e6ecf5;
        }

        .highlight-card h4 { margin-bottom: 0.5rem; color: #0D47A1; }
        .highlight-card p { color: #555; }

        .social-ribbon {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1rem;
            width: 100%;
            max-width: 1100px;
            margin-top: 1.5rem;
        }

        .social-pill {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 1rem 1.2rem;
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.38);
            background: linear-gradient(135deg, rgba(255,255,255,0.16), rgba(255,255,255,0.08));
            box-shadow: 0 14px 32px rgba(0,0,0,0.16);
            backdrop-filter: blur(12px);
            color: white;
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .social-pill:hover { transform: translateY(-3px); box-shadow: 0 18px 40px rgba(0,0,0,0.2); border-color: rgba(255,255,255,0.6); }

        .social-meta { display: flex; align-items: center; gap: 12px; }
        .social-icon { width: 40px; height: 40px; border-radius: 12px; display: grid; place-items: center; background: rgba(255,255,255,0.22); font-size: 1.25rem; color: white; }
        .social-text strong { display: block; font-size: 1.05rem; }
        .social-text span { font-size: 0.92rem; opacity: 0.9; }

        .social-cta {
            background: white;
            color: #0B4FA3;
            padding: 0.55rem 1.1rem;
            border-radius: 999px;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 12px 26px rgba(0,0,0,0.18);
            transition: transform 0.2s ease, box-shadow 0.2s ease, color 0.2s ease;
        }

        .social-cta:hover { transform: translateY(-2px); box-shadow: 0 16px 32px rgba(0,0,0,0.22); color: #083a7a; }

        .donation-banner {
            background: linear-gradient(120deg, #0D47A1 0%, #1565C0 45%, #00BFA6 100%);
            color: white;
            border-radius: 22px;
            padding: 2.5rem;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 1.5rem;
            align-items: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.22);
        }

        .donation-banner h3 { font-size: 2rem; margin-bottom: 0.5rem; }
        .donation-banner p { opacity: 0.9; }

        .donation-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 1rem 1.4rem;
            border-radius: 14px;
            background: white;
            color: #0D47A1;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 14px 32px rgba(0,0,0,0.18);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .donation-cta:hover { transform: translateY(-2px); box-shadow: 0 18px 40px rgba(0,0,0,0.22); }

        .payments-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1rem;
        }

        .payment-card {
            background: white;
            border-radius: 16px;
            padding: 1.4rem;
            border: 1px solid #e8ecf2;
            box-shadow: 0 10px 24px rgba(0,0,0,0.08);
        }

        .payment-card h4 { margin: 0.3rem 0 0.4rem; color: #0D47A1; }
        .payment-card p { color: #555; margin: 0; }
        .payment-badge { display: inline-block; padding: 6px 10px; border-radius: 999px; background: rgba(21,101,192,0.08); color: #0D47A1; font-weight: 700; font-size: 0.85rem; }

        .pill-row { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 0.8rem; }
        .pill-row span { background: #f2f6fc; padding: 6px 10px; border-radius: 999px; font-weight: 600; color: #0D47A1; font-size: 0.9rem; }

        .price-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .price-card {
            background: linear-gradient(135deg, #ffffff 0%, #f7faff 100%);
            border-radius: 18px;
            padding: 1.8rem;
            box-shadow: 0 16px 34px rgba(0,0,0,0.08);
            border: 1px solid #e1e8f5;
            position: relative;
            overflow: hidden;
        }

        .price-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(66,165,245,0.14), rgba(21,101,192,0));
            opacity: 0;
            transition: opacity 0.25s ease;
            pointer-events: none;
        }

        .price-card:hover::after { opacity: 1; }

        .price-card h3 { margin-bottom: 0.4rem; color: #0D47A1; position: relative; }
        .price-card p { color: #555; margin: 0.2rem 0 0.4rem; position: relative; }
        .price-tag { font-size: 2.1rem; font-weight: 800; color: #1565C0; margin: 0.2rem 0; position: relative; }
        .price-note { font-size: 0.95rem; color: #666; }
        .list-clean { list-style: none; padding-left: 0; margin: 0.6rem 0 0; }
        .list-clean li { padding: 0.25rem 0; color: #555; }

        .price-accent {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(21,101,192,0.1);
            color: #0D47A1;
            font-weight: 700;
            margin-bottom: 0.6rem;
            position: relative;
        }

        .price-accent.alt { background: rgba(0,191,166,0.1); color: #008f7c; }
        .price-accent.danger { background: rgba(229,57,53,0.14); color: #C62828; }

        .raffle-banner {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .raffle-card {
            background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
            border: 1px solid #ffd180;
            border-radius: 16px;
            padding: 1rem 1.2rem;
            box-shadow: 0 14px 30px rgba(0,0,0,0.08);
            color: #c66a00;
            font-weight: 700;
            text-align: center;
        }

        .raffle-card i { margin-right: 8px; }

        /* Intro arriba de "Quiénes somos" */
        .intro-section { background: linear-gradient(135deg, #0d47a1 0%, #1565c0 40%, #42a5f5 100%); color: white; padding: 4rem 2rem; }
        .intro-grid { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 1.5rem; align-items: center; max-width: 1100px; margin: 0 auto; }
        .intro-lead h2 { font-size: 2.4rem; margin-bottom: 0.8rem; }
        .intro-lead p { color: rgba(255,255,255,0.9); margin-bottom: 1rem; }
        .intro-badges { display: flex; flex-wrap: wrap; gap: 10px; }
        .intro-badge { background: rgba(255,255,255,0.14); border: 1px solid rgba(255,255,255,0.26); padding: 8px 12px; border-radius: 999px; font-weight: 700; backdrop-filter: blur(6px); }
        .intro-card { background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); border-radius: 18px; padding: 1.6rem; box-shadow: 0 20px 46px rgba(0,0,0,0.22); }
        .intro-card h3 { margin-bottom: 0.4rem; font-size: 1.1rem; }
        .intro-card p { color: rgba(255,255,255,0.88); margin: 0; }
        .intro-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 1rem; }
        .intro-tag { background: rgba(0,0,0,0.22); padding: 6px 10px; border-radius: 10px; font-weight: 600; font-size: 0.95rem; border: 1px solid rgba(255,255,255,0.18); }
        .intro-stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 10px; margin-top: 1rem; }
        .intro-stat { background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.18); border-radius: 12px; padding: 10px 12px; }
        .intro-stat strong { display: block; font-size: 1.4rem; }
        .intro-stat span { color: rgba(255,255,255,0.82); font-weight: 700; }
        .intro-social { display: flex; gap: 10px; margin-top: 1rem; }
        .social-icon-btn { width: 44px; height: 44px; display: grid; place-items: center; border-radius: 14px; background: rgba(255,255,255,0.16); border: 1px solid rgba(255,255,255,0.28); color: white; font-size: 1.1rem; transition: transform 0.2s, background 0.2s, border-color 0.2s; }
        .social-icon-btn:hover { transform: translateY(-2px); background: rgba(255,255,255,0.26); border-color: rgba(255,255,255,0.5); }

        /* Guías y asesorías destacados */
        .guide-banner { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1rem; margin-top: 1.6rem; }
        .guide-card { border-radius: 16px; padding: 1.2rem 1.4rem; color: #0d1b2a; position: relative; overflow: hidden; box-shadow: 0 18px 42px rgba(0,0,0,0.12); border: 1px solid #e2e8f0; background: linear-gradient(135deg, #ffffff 0%, #f2f7ff 100%); }
        .guide-card.alt { background: linear-gradient(135deg, #f1f8e9 0%, #dcedc8 100%); border-color: #c5e1a5; color: #345b2c; }
        .guide-card.danger { background: linear-gradient(135deg, #fff1f0 0%, #ffe0db 100%); border-color: #ffc9c2; color: #a0302d; }
        .guide-chip { display: inline-flex; align-items: center; gap: 8px; padding: 6px 10px; border-radius: 12px; background: rgba(21,101,192,0.1); color: #0d47a1; font-weight: 700; margin-bottom: 8px; }
        .guide-icon { width: 32px; height: 32px; border-radius: 10px; display: grid; place-items: center; background: rgba(13,71,161,0.1); color: #0d47a1; }
        .guide-card.danger .guide-chip { background: rgba(229,57,53,0.12); color: #c62828; }
        .guide-card.alt .guide-chip { background: rgba(0,191,166,0.12); color: #008f7c; }
        .guide-meta { display: flex; align-items: center; gap: 10px; margin-bottom: 6px; font-weight: 800; }
        .guide-meta i { font-size: 1.1rem; }
        .guide-card p { margin: 0; color: #4b5563; }
        .guide-card.danger p { color: #7a2e2a; }
        .guide-card.alt p { color: #4a5b3a; }

        /* Rifa celular destacado */
        .raffle-highlight { margin-top: 1.8rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem; }
        .raffle-feature { background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.25), transparent 40%), linear-gradient(135deg, #ff9a1f 0%, #ff6f00 40%, #ff9100 100%); color: #2b1400; padding: 1.4rem 1.6rem; border-radius: 18px; border: 1px solid rgba(255,255,255,0.35); box-shadow: 0 18px 40px rgba(0,0,0,0.18); position: relative; overflow: hidden; }
        .raffle-feature::after { content: ''; position: absolute; inset: 0; background: radial-gradient(circle at 80% 20%, rgba(255,255,255,0.25), transparent 40%); pointer-events: none; }
        .raffle-badge { display: inline-flex; align-items: center; gap: 8px; padding: 6px 12px; background: rgba(255,255,255,0.18); border-radius: 12px; font-weight: 800; color: #2b1400; }
        .raffle-feature h3 { margin: 0.6rem 0 0.3rem; font-size: 1.35rem; }
        .raffle-feature p { margin: 0; color: rgba(43,20,0,0.82); font-weight: 600; }

        @media (max-width: 860px) {
            .intro-grid { grid-template-columns: 1fr; }
        }

        .about-section {
            background: #f8fbff;
            padding: 4rem 2rem;
        }

        .about-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            align-items: center;
        }

        .about-card {
            background: white;
            border-radius: 18px;
            padding: 1.8rem;
            box-shadow: 0 14px 34px rgba(0,0,0,0.08);
            border: 1px solid #e6ecf5;
        }

        .about-card h3 { color: #0D47A1; margin-bottom: 0.5rem; }
        .about-card p { color: #555; margin-bottom: 0.6rem; }
        .about-pill { display: inline-block; background: #e3f2fd; color: #0D47A1; padding: 6px 10px; border-radius: 999px; font-weight: 700; font-size: 0.9rem; margin-right: 6px; margin-top: 6px; }

        .animated-card {
            opacity: 0;
            transform: translateY(20px);
        }

        .card-visible {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        @keyframes floaty {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.25; }
            50% { transform: scale(1.05); opacity: 0.35; }
            100% { transform: scale(1); opacity: 0.25; }
        }

        /* Footer */
        footer {
            background: #0D47A1;
            color: white;
            padding: 3rem 2rem 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .footer-section p {
            opacity: 0.9;
            line-height: 1.8;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: white;
            font-size: 1.5rem;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #64B5F6;
        }

        .contact-info p {
            margin: 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero .subtitle {
                font-size: 1.1rem;
            }

            nav { position: relative; }

            .menu-toggle { display: inline-flex; }

            .nav-links {
                position: absolute;
                top: 70px;
                right: 16px;
                left: 16px;
                flex-direction: column;
                align-items: flex-start;
                background: white;
                color: #0D47A1;
                border: 1px solid rgba(0,0,0,0.08);
                box-shadow: 0 18px 42px rgba(0,0,0,0.2);
                border-radius: 16px;
                padding: 1.2rem;
                gap: 1rem;
                display: none;
            }

            .nav-links.open { display: flex; }

            .nav-links a { width: 100%; color: #0D47A1; }
            .nav-links a::after { background: #1565C0; }

            .services-grid,
            .aportes-grid,
            .membresias-grid,
            .depositos-grid {
                grid-template-columns: 1fr;
            }

            .video-widget {
                height: 500px;
            }

            .social-dock { grid-template-columns: 1fr; }
            .donation-banner { grid-template-columns: 1fr; text-align: left; }
            .donation-banner div:last-child { text-align: left; }
        }

        @media (max-width: 768px) {
            .social-ribbon { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="logo">La Casa del Estudiante</div>
            <button class="menu-toggle" id="menuToggle" aria-label="Abrir menú">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-links">
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#quienes">About</a></li>
                <li><a href="#preventa">Preventa</a></li>
                <li><a href="#donaciones">Donaciones</a></li>
                <li><a href="#preparatoria">Preparatoria</a></li>
                <li><a href="#servicios">Servicios</a></li>
                <li><a href="#soporte">Soporte</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    
    <!-- Intro personal -->
    <section id="quienes" class="intro-section">
        <div class="intro-grid">
            <div class="intro-lead">
                <div class="hero-badge" style="background:rgba(255,255,255,0.14); border-color:rgba(255,255,255,0.35);">Hola, soy Antonio</div>
                <h2>Te acerco a tu prepa y a todo lo que necesitas en un solo lugar</h2>
                <p>Espacio seguro con papelería, café e inscripción a prepa abierta para que avances tu educación sin perder tiempo. Procesos claros, precios honestos y acompañamiento real.</p>
                <div class="intro-badges">
                    <span class="intro-badge">Prepa abierta · 22 módulos</span>
                    <span class="intro-badge">Asesorías a la medida</span>
                    <span class="intro-badge">Papelería con entregas locales</span>
                    <span class="intro-badge">Cafetería y estudio</span>
                </div>
                <div class="intro-stats">
                    <div class="intro-stat"><strong>22</strong><span>Módulos con guías listas</span></div>
                    <div class="intro-stat"><strong>48h</strong><span>Entrega de guías tras inscripción</span></div>
                    <div class="intro-stat"><strong>1:1</strong><span>Asesorías bajo demanda</span></div>
                                        <div class="intro-stat"><strong>❤</strong><span>De mi para ti, para todos</span></div>
                </div>
                <div class="intro-social" aria-label="Redes sociales">
                    <a class="social-icon-btn" href="https://www.facebook.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="social-icon-btn" href="https://www.instagram.com" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a class="social-icon-btn" href="https://tiktok.com" target="_blank" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    <a class="social-icon-btn" href="https://wa.me/52" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="intro-card">
                <h3><i class="fas fa-route"></i> Camino rápido</h3>
                <p>Te inscribes una sola vez, recibes guías en máximo 48h, agendas asesorías solo cuando requieres refuerzo y tienes café e internet listos en el mismo espacio.</p>
                <div class="intro-tags">
                    <span class="intro-tag"><i class="fas fa-book"></i> Guías incluidas</span>
                    <span class="intro-tag"><i class="fas fa-chalkboard-teacher"></i> Asesorías Premium</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Servicios -->
    <section id="servicios" class="services">
        <div class="container">
            <h2 class="section-title">Nuestros Servicios</h2>
            <p class="subtitle" style="text-align:center; margin:-1.5rem 0 2rem; color:#555;">Un ecosistema completo para que estudies, trabajes y crezcas sin distracciones.</p>
            <div class="services-grid">
                <div class="service-card animated-card">
                    <div class="service-icon">
                        <i class="fas fa-print"></i>
                    </div>
                    <h3>Papelería y Copias</h3>
                    <p>Copiado, impresión, engargolado y enmicado con calidad. Entrega local en zona definida.</p>
                    <p class="chip-pill" style="display:inline-block; margin-top:10px;">Compra en línea (pronto)</p>
                </div>

                <div class="service-card animated-card">
                    <div class="service-icon">
                        <i class="fas fa-coffee"></i>
                    </div>
                    <h3>Cafetería</h3>
                    <p>Bebidas y snacks para acompañar tus sesiones. Paquetes listos para llevar.</p>
                </div>

                <div class="service-card animated-card">
                    <div class="service-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h3>Internet y Cómputo</h3>
                    <p>Alta velocidad y equipos disponibles. Computadoras listas para tus necesidades.</p>

                </div>

                <div class="service-card animated-card">
                    <div class="service-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Preparatoria Abierta</h3>
                    <p>Inscripción única, 22 módulos con costo por módulo, guías incluidas. Asesorías pagadas aparte.</p>
                </div>

                <div class="service-card animated-card">
                    <div class="service-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3>Soporte Técnico</h3>
                    <p>Mantenimiento preventivo y correctivo de Laptops. Tu equipo en manos expertas.</p>
                </div>

                <div class="service-card animated-card">
                    <div class="service-icon">
                        <i class="fas fa-people-group"></i>
                    </div>
                    <h3>Club de tareas y talleres</h3>
                    <p>Sesiones guiadas y talleres express para reforzar temas clave y avanzar sin atorarte.</p>
                    <p class="chip-pill" style="display:inline-block; margin-top:10px;">Cupo limitado</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Preparatoria Abierta -->
    <section id="preparatoria" class="preventa">
        <div class="container">
            <div class="section-kicker"><i class="fas fa-graduation-cap"></i> Preparatoria abierta</div>
            <h2 class="section-title" style="margin-bottom:1.2rem;">Inscripción única y 22 módulos</h2>
            <p class="subtitle" style="text-align:center; margin:-1rem 0 1.5rem; color:#555;">Separaremos las asesorías en otra página; aquí concentras inscripción, módulos y guías. Las asesorías tienen costo aparte.</p>

            <div class="price-grid">
                <div class="price-card animated-card">
                    <div class="payment-badge" style="margin-bottom:0.5rem;"><i class="fas fa-id-card"></i> Inscripción</div>
                    <h3>Registro único</h3>
                    <div class="price-tag">$ — MXN</div>
                    <p class="price-note">Incluye alta, acceso a portal y guías base.</p>
                    <ul class="list-clean">
                        <li>Entrega de guías digitales</li>
                        <li>Asignación de 22 módulos</li>
                        <li>Credencialización (en sitio)</li>
                    </ul>
                </div>
                <div class="price-card animated-card">
                    <div class="payment-badge" style="margin-bottom:0.5rem; background:rgba(0,191,166,0.1); color:#008f7c;"><i class="fas fa-layer-group"></i> Módulos</div>
                    <h3>22 módulos</h3>
                    <div class="price-tag">$ — por módulo</div>
                    <p class="price-note">Pago por módulo. Guías incluidas, asesorías opcionales.</p>
                    <ul class="list-clean">
                        <li>Material por módulo</li>
                        <li>Calendario y entregas</li>
                        <li>Seguimiento por caja</li>
                    </ul>
                </div>
                <div class="price-card animated-card">
                    <div class="payment-badge" style="margin-bottom:0.5rem; background:rgba(229,57,53,0.12); color:#C62828;"><i class="fas fa-chalkboard-teacher"></i> Asesorías</div>
                    <h3>Soporte especializado</h3>
                    <div class="price-tag">$ — según sesión</div>
                    <p class="price-note">Opcional y de pago. Se agenda en la página dedicada.</p>
                    <ul class="list-clean">
                        <li>Sesiones 1:1 o grupales</li>
                        <li>Refuerzo para exámenes</li>
                        <li>Reservas en línea (próximamente)</li>
                    </ul>
                </div>
            </div>

            <div class="guide-banner">
                <div class="guide-card animated-card">
                    <div class="guide-meta"><span class="guide-icon"><i class="fas fa-book"></i></span>Guías listas para avanzar</div>
                    <div class="guide-chip"><i class="fas fa-id-card"></i> Incluidas con inscripción y módulos</div>
                    <p>Recibe tus guías digitales desde el día uno para cada módulo. Sin pagos extra.</p>
                </div>
                <div class="guide-card danger animated-card">
                    <div class="guide-meta"><span class="guide-icon" style="background:rgba(229,57,53,0.12); color:#c62828;"><i class="fas fa-chalkboard-teacher"></i></span>Asesorías personalizadas</div>
                    <div class="guide-chip" style="background:rgba(229,57,53,0.12); color:#c62828;"><i class="fas fa-clock"></i> Agenda cuando las necesites</div>
                    <p>Sesiones 1:1 o grupales para reforzar exámenes. Se pagan aparte y las programas en línea.</p>
                </div>
                <div class="guide-card alt animated-card">
                    <div class="guide-meta"><span class="guide-icon" style="background:rgba(0,191,166,0.12); color:#008f7c;"><i class="fas fa-layer-group"></i></span>22 módulos claros</div>
                    <div class="guide-chip" style="background:rgba(0,191,166,0.12); color:#008f7c;"><i class="fas fa-check-circle"></i> Ruta completa</div>
                    <p>Plan de 22 módulos, calendario y entregas. Seguimiento por caja y recordatorios.</p>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Pasos claros -->
    <section class="preventa" style="padding-top:2rem;">
        <div class="container">
            <h2 class="section-title">¿Cómo funciona la preventa?</h2>
            <div class="membresias-grid" style="margin-bottom:1.5rem; grid-template-columns: repeat(auto-fit, minmax(260px,1fr));">
                <div class="aporte-card" style="border-color:#dce7fb;">
                    <div class="aporte-icon"><i class="fas fa-hand-holding-heart" style="color:#1565C0;"></i></div>
                    <h3>1. Aporta</h3>
                    <p>Elige tu tarjeta o aporte inmediato.</p>
                </div>
                <div class="aporte-card" style="border-color:#dce7fb;">
                    <div class="aporte-icon"><i class="fas fa-receipt" style="color:#1565C0;"></i></div>
                    <h3>2. Envía comprobante</h3>
                    <p>Comparte el ticket para validar beneficios.</p>
                </div>
                <div class="aporte-card" style="border-color:#dce7fb;">
                    <div class="aporte-icon"><i class="fas fa-credit-card" style="color:#1565C0;"></i></div>
                    <h3>3. Recibe tu crédito</h3>
                    <p>Se activa tu saldo y descuentos.</p>
                </div>
                <div class="aporte-card" style="border-color:#dce7fb;">
                    <div class="aporte-icon"><i class="fas fa-mug-hot" style="color:#1565C0;"></i></div>
                    <h3>4. Disfruta el espacio</h3>
                    <p>Usa café, internet y asesorías desde el día uno.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Preventa -->
    <section id="preventa" class="preventa">
        <div class="container">
            <h2 class="section-title">Campaña de Preventa</h2>
            <p class="preventa-subtitle">Inversión, No Donación</p>

            <!-- Fila A: Aportes con Recompensa Inmediata -->
            <div class="aportes-grid">
                <div class="aporte-card animated-card">
                    <div class="aporte-icon">
                        <i class="fas fa-mug-hot"></i>
                    </div>
                    <div class="aporte-price">$15 MXN</div>
                    <h3>Café Básico</h3>
                    <p>Café de olla o americano</p>
                </div>

                <div class="aporte-card animated-card">
                    <div class="aporte-icon">
                        <i class="fas fa-coffee"></i>
                    </div>
                    <div class="aporte-price">$50 MXN</div>
                    <h3>Pack Taza</h3>
                    <p>Taza de cerámica + Capuchino</p>
                </div>

                <div class="aporte-card animated-card">
                    <div class="aporte-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <div class="aporte-price">$100 MXN</div>
                    <h3>Pack Premium</h3>
                    <p>Taza + Capuchino + Eventos VIP</p>
                </div>

                <div class="aporte-card apoyo animated-card">
                    <div class="aporte-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="aporte-price">Apóyanos</div>
                    <h3>Aporte Voluntario</h3>
                    <p>La cantidad que desees aportar</p>
                </div>
            </div>

            <!-- Fila B: Tarjetas de Membresía con Crédito -->
            <div class="membresias-grid">
                <div class="membresia-card membresia-gold animated-card">
                    <div class="membresia-badge">
                        <i class="fas fa-star"></i> GOLD
                    </div>
                    <div class="membresia-price">$150 MXN</div>
                    <ul class="membresia-features">
                        <li><i class="fas fa-check"></i> Vigencia 12 meses, luego renovación</li>
                        <li><i class="fas fa-check"></i> $150 crédito inmediato</li>
                        <li><i class="fas fa-check"></i> 10% descuento anual</li>
                        <li><i class="fas fa-check"></i> En papelería y café</li>
                        <li><i class="fas fa-check"></i> Beneficios exclusivos</li>
                    </ul>
                </div>

                <div class="membresia-card membresia-platinum animated-card">
                    <div class="membresia-badge">
                        <i class="fas fa-gem"></i> PLATINUM
                    </div>
                    <div class="membresia-price">$200 MXN</div>
                    <ul class="membresia-features">
                        <li><i class="fas fa-check"></i> Vigencia 12 meses, luego renovación</li>
                        <li><i class="fas fa-check"></i> $200 de crédito inmediato</li>
                        <li><i class="fas fa-check"></i> 10% descuento anual</li>
                        <li><i class="fas fa-check"></i> Prioridad en servicios</li>
                    </ul>
                </div>

                <div class="membresia-card membresia-vip animated-card">
                    <div class="membresia-badge">
                        <i class="fas fa-crown"></i> VIP BLACK
                    </div>
                    <div class="membresia-price">$300 MXN</div>
                    <ul class="membresia-features">
                        <li><i class="fas fa-check"></i> Vigencia 12 meses, luego renovación</li>
                        <li><i class="fas fa-check"></i> $300 de crédito inmediato</li>
                        <li><i class="fas fa-check"></i> 10% descuento anual</li>
                        <li><i class="fas fa-check"></i> Acceso VIP a eventos</li>
                    </ul>
                </div>
            </div>

            <div class="raffle-highlight">
                <div class="raffle-feature animated-card">
                    <div class="raffle-badge"><i class="fas fa-mobile"></i> Rifa de celular</div>
                    <h3>1 boleto por cada $500 MXN</h3>
                    <p>Participas con cada aporte acumulado. Más apoyo, más oportunidades de ganar.</p>
                </div>
                <div class="raffle-feature animated-card" style="background:linear-gradient(135deg,#e8f5e9 0%,#c8e6c9 100%); color:#1f3a23; border-color:rgba(255,255,255,0.25);">
                    <div class="raffle-badge" style="background:rgba(255,255,255,0.22); color:#1f3a23;"><i class="fas fa-bolt"></i> Beneficios desde el día 1</div>
                    <h3>Activa descuentos y créditos inmediato</h3>
                    <p>Tu saldo y descuentos se habilitan al registrar el pago. Sin esperas.</p>
                </div>
                <div class="raffle-feature animated-card" style="background:linear-gradient(135deg,#e3f2fd 0%,#bbdefb 100%); color:#0d2f57; border-color:rgba(255,255,255,0.25);">
                    <div class="raffle-badge" style="background:rgba(255,255,255,0.22); color:#0d2f57;"><i class="fas fa-calendar-check"></i> Vigencia anual</div>
                    <h3>Descuentos válidos todo el año</h3>
                    <p>Mantén tu tarifa preferente en papelería y servicios durante 12 meses.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Donaciones -->
    <section id="donaciones" class="preventa" style="background:#f1f4fb;">
        <div class="container">
            <div class="section-kicker"><i class="fas fa-hand-holding-dollar"></i> Donaciones y preventa</div>
            <h2 class="section-title" style="margin-bottom:1.2rem;">Contribuye y desbloquea beneficios</h2>

            <div class="donation-banner animated-card">
                <div>
                    <h3>Portal de donaciones</h3>
                    <p>Redirigimos tus datos a un entorno seguro para recibir tarjetas, transferencias y pagos en efectivo. Tu aportación activa créditos, descuentos y acceso anticipado.</p>
                    <div class="pill-row">
                        <span>Pasarela cifrada</span>
                        <span>Tarjeta, SPEI y OXXO</span>
                        <span>Factura disponible</span>
                    </div>
                </div>
                <div style="text-align:right;">
                    <a class="donation-cta" href="pay/" target="_blank" rel="noopener">
                        <i class="fas fa-arrow-right"></i> Aportar ahora
                    </a>
                    <p style="margin-top:0.8rem; opacity:0.85; font-size:0.95rem;">Te llevaremos a la página para capturar tus datos bancarios.</p>
                </div>
            </div>

            <div class="payments-grid" style="margin-top:1.8rem;">
                <div class="payment-card animated-card">
                    <div class="payment-badge"><i class="fas fa-credit-card"></i> Tarjeta</div>
                    <h4>Cobro inmediato</h4>
                    <p>Visa, Mastercard y débito. Sin comisiones adicionales para ti.</p>
                </div>
                <div class="payment-card animated-card">
                    <div class="payment-badge" style="background:rgba(0,191,166,0.1); color:#008f7c;"><i class="fas fa-university"></i> Transferencia</div>
                    <h4>SPEI / Transfer</h4>
                    <p>Una CLABE única para validar tu aporte en minutos.</p>
                </div>
                <div class="payment-card animated-card">
                    <div class="payment-badge" style="background:rgba(229,57,53,0.12); color:#C62828;"><i class="fas fa-store"></i> OXXO / Efectivo</div>
                    <h4>Pago en tienda</h4>
                    <p>Genera un código de barras y paga en efectivo en el punto más cercano.</p>
                </div>
            </div>
        </div>
    </section>

    



    <!-- Footer -->
    <footer id="contacto">
        <div class="footer-content">
            <div class="footer-section">
                <h3><i class="fas fa-home"></i> La Casa del Estudiante</h3>
                <p>Novus Media Center es más que un negocio, es un centro de oportunidades para estudiantes. Ofrecemos servicios integrales para tu desarrollo académico y profesional.</p>
            </div>

            <div class="footer-section">
                <h3><i class="fas fa-share-alt"></i> Redes Sociales</h3>
                <div class="social-links">
                    <a href="https://facebook.com" target="_blank" title="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://tiktok.com" target="_blank" title="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://wa.me/52" target="_blank" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <div class="footer-section">
                <h3><i class="fas fa-address-book"></i> Contacto</h3>
                <div class="contact-info">
                    <p><i class="fas fa-envelope"></i> info@lacasadelestudiante.com</p>
                    <p><i class="fas fa-phone"></i> +52 (55) 1234-5678</p>
                    <p><i class="fas fa-map-marker-alt"></i> Ciudad de México, México</p>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p>&copy; 2024 La Casa del Estudiante - Todos los derechos reservados</p>
        </div>
    </footer>

    <script>
        // Smooth scroll para navegación
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Menú móvil
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.querySelector('.nav-links');

        if (menuToggle && navLinks) {
            menuToggle.addEventListener('click', () => {
                navLinks.classList.toggle('open');
                menuToggle.classList.toggle('active');
                menuToggle.setAttribute('aria-expanded', navLinks.classList.contains('open'));
            });

            navLinks.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    navLinks.classList.remove('open');
                    menuToggle.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', 'false');
                });
            });
        }

        // Animación al hacer scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('card-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animated-card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>