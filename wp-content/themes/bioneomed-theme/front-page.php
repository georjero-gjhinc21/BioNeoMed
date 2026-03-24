<?php
/**
 * Front Page Template — BioNeoMed Premium Design
 * Full-page standalone output with premium editorial aesthetic
 */
if (!defined('ABSPATH')) exit;
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<?php wp_head(); ?>
<style>
  :root {
    --navy: #0a1628;
    --navy-mid: #0f2040;
    --teal: #0d9488;
    --teal-light: #14b8a6;
    --teal-glow: rgba(13,148,136,0.15);
    --gold: #c9a84c;
    --cream: #f5f0e8;
    --white: #ffffff;
    --gray: #94a3b8;
    --gray-light: #e2e8f0;
    --text: #1e293b;
  }
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }
  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--navy);
    color: var(--white);
    overflow-x: hidden;
  }

  /* NAV */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    display: flex; align-items: center; justify-content: space-between;
    padding: 1.2rem 4rem;
    background: rgba(10,22,40,0.85);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(13,148,136,0.2);
    transition: all 0.3s;
  }
  .nav-logo { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; }
  .nav-logo-mark {
    width: 36px; height: 36px;
    background: linear-gradient(135deg, var(--teal), var(--teal-light));
    border-radius: 8px; display: flex; align-items: center; justify-content: center;
    font-family: 'Cormorant Garamond', serif; font-weight: 600; font-size: 1.1rem;
    color: white; letter-spacing: -1px;
  }
  .nav-logo-text {
    font-family: 'Cormorant Garamond', serif; font-size: 1.15rem; font-weight: 600;
    color: var(--white); letter-spacing: 0.02em;
  }
  .nav-links { display: flex; align-items: center; gap: 2.5rem; }
  .nav-links a {
    color: var(--gray); text-decoration: none; font-size: 0.85rem; font-weight: 400;
    letter-spacing: 0.05em; text-transform: uppercase; transition: color 0.2s;
  }
  .nav-links a:hover { color: var(--teal-light); }
  .nav-cta {
    background: var(--teal) !important; color: white !important;
    padding: 0.55rem 1.4rem; border-radius: 6px;
    font-weight: 500 !important; letter-spacing: 0.05em; transition: background 0.2s !important;
  }
  .nav-cta:hover { background: var(--teal-light) !important; }

  /* HERO */
  .hero {
    min-height: 100vh; display: flex; flex-direction: column; justify-content: center;
    padding: 8rem 4rem 5rem; position: relative; overflow: hidden;
  }
  .hero-bg {
    position: absolute; inset: 0; z-index: 0;
    background:
      radial-gradient(ellipse 80% 60% at 60% 40%, rgba(13,148,136,0.12) 0%, transparent 70%),
      radial-gradient(ellipse 40% 40% at 85% 70%, rgba(201,168,76,0.06) 0%, transparent 60%),
      linear-gradient(160deg, #0a1628 0%, #0d1f3c 50%, #091520 100%);
  }
  .hero-grid {
    position: absolute; inset: 0; z-index: 0;
    background-image:
      linear-gradient(rgba(13,148,136,0.04) 1px, transparent 1px),
      linear-gradient(90deg, rgba(13,148,136,0.04) 1px, transparent 1px);
    background-size: 60px 60px;
  }
  .hero-content { position: relative; z-index: 1; max-width: 780px; }
  .hero-badge {
    display: inline-flex; align-items: center; gap: 0.5rem;
    background: rgba(13,148,136,0.1); border: 1px solid rgba(13,148,136,0.3);
    border-radius: 100px; padding: 0.4rem 1rem;
    font-size: 0.75rem; letter-spacing: 0.12em; text-transform: uppercase;
    color: var(--teal-light); margin-bottom: 2rem;
    animation: fadeUp 0.8s ease both;
  }
  .hero-badge::before {
    content: ''; width: 6px; height: 6px; border-radius: 50%;
    background: var(--teal-light); animation: pulse 2s ease infinite;
  }
  @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.3} }
  h1 {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(3rem, 7vw, 5.5rem); font-weight: 300; line-height: 1.1;
    letter-spacing: -0.01em; animation: fadeUp 0.8s 0.15s ease both;
  }
  h1 em { font-style: italic; color: var(--teal-light); }
  h1 span { color: var(--gold); }
  .hero-sub {
    font-size: 1.1rem; color: var(--gray); line-height: 1.7;
    max-width: 560px; margin-top: 1.5rem; font-weight: 300;
    animation: fadeUp 0.8s 0.3s ease both;
  }
  .hero-actions {
    display: flex; gap: 1rem; margin-top: 2.5rem; flex-wrap: wrap;
    animation: fadeUp 0.8s 0.45s ease both;
  }
  .btn-primary {
    background: var(--teal); color: white; padding: 0.9rem 2.2rem; border-radius: 8px;
    font-weight: 500; font-size: 0.95rem; text-decoration: none; border: none; cursor: pointer;
    transition: all 0.25s; display: inline-flex; align-items: center; gap: 0.5rem;
  }
  .btn-primary:hover { background: var(--teal-light); transform: translateY(-2px); box-shadow: 0 8px 30px rgba(13,148,136,0.35); }
  .btn-outline {
    border: 1px solid rgba(255,255,255,0.2); color: white; padding: 0.9rem 2.2rem;
    border-radius: 8px; font-weight: 400; font-size: 0.95rem; text-decoration: none;
    transition: all 0.25s; display: inline-flex; align-items: center; gap: 0.5rem;
  }
  .btn-outline:hover { border-color: var(--teal-light); color: var(--teal-light); }
  .hero-stats {
    display: flex; gap: 3rem; margin-top: 4rem; padding-top: 2rem;
    border-top: 1px solid rgba(255,255,255,0.08);
    animation: fadeUp 0.8s 0.6s ease both;
  }
  .stat-num {
    font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; font-weight: 600;
    color: var(--white); display: block; line-height: 1;
  }
  .stat-label { font-size: 0.78rem; color: var(--gray); text-transform: uppercase; letter-spacing: 0.1em; margin-top: 0.3rem; display: block; }
  @keyframes fadeUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }

  /* MISSION STRIP */
  .mission-strip {
    background: var(--teal); padding: 1.2rem 4rem;
    display: flex; align-items: center; justify-content: center; gap: 1rem;
    font-size: 0.85rem; letter-spacing: 0.08em; text-transform: uppercase; font-weight: 500;
  }
  .mission-strip strong { color: var(--gold); }

  /* SECTIONS */
  section { padding: 6rem 4rem; }
  .section-label {
    font-family: 'DM Mono', monospace; font-size: 0.72rem; letter-spacing: 0.18em;
    text-transform: uppercase; color: var(--teal-light); margin-bottom: 1rem;
  }
  .section-title {
    font-family: 'Cormorant Garamond', serif; font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 300; line-height: 1.2; color: var(--white); max-width: 600px;
  }
  .section-title em { font-style: italic; color: var(--gold); }

  /* ABOUT */
  .about { background: var(--navy-mid); }
  .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; margin-top: 3.5rem; align-items: start; }
  .about-text p { color: #94a3b8; line-height: 1.8; margin-bottom: 1.2rem; font-weight: 300; font-size: 1.02rem; }
  .about-text p strong { color: var(--cream); font-weight: 500; }
  .about-text .highlight {
    border-left: 2px solid var(--teal); padding-left: 1.2rem; margin: 1.5rem 0;
    font-family: 'Cormorant Garamond', serif; font-size: 1.25rem; font-style: italic;
    color: var(--gray-light); line-height: 1.6;
  }
  .about-pillars { display: flex; flex-direction: column; gap: 1.2rem; }
  .pillar {
    background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);
    border-radius: 10px; padding: 1.4rem 1.5rem; display: flex; gap: 1rem; align-items: flex-start;
    transition: border-color 0.25s, background 0.25s;
  }
  .pillar:hover { border-color: rgba(13,148,136,0.4); background: var(--teal-glow); }
  .pillar-icon {
    width: 40px; height: 40px; border-radius: 8px;
    background: rgba(13,148,136,0.15); border: 1px solid rgba(13,148,136,0.25);
    display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;
  }
  .pillar-body h4 { font-size: 0.9rem; font-weight: 500; margin-bottom: 0.3rem; }
  .pillar-body p { font-size: 0.84rem; color: var(--gray); line-height: 1.6; }

  /* DISEASES */
  .diseases { background: var(--navy); }
  .disease-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 3rem; }
  .disease-card {
    background: linear-gradient(135deg, rgba(255,255,255,0.04), rgba(255,255,255,0.01));
    border: 1px solid rgba(255,255,255,0.08); border-radius: 14px; padding: 2rem;
    transition: all 0.3s; cursor: default; position: relative; overflow: hidden;
  }
  .disease-card::before {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(13,148,136,0.08), transparent);
    opacity: 0; transition: opacity 0.3s;
  }
  .disease-card:hover { border-color: rgba(13,148,136,0.4); transform: translateY(-4px); }
  .disease-card:hover::before { opacity: 1; }
  .disease-num { font-family: 'DM Mono', monospace; font-size: 0.7rem; color: var(--teal-light); letter-spacing: 0.1em; margin-bottom: 1rem; display: block; }
  .disease-card h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; font-weight: 400; margin-bottom: 0.75rem; }
  .disease-card p { font-size: 0.87rem; color: var(--gray); line-height: 1.7; }
  .disease-tag {
    display: inline-block; margin-top: 1.2rem; font-size: 0.7rem; letter-spacing: 0.1em;
    text-transform: uppercase; color: var(--teal-light);
    padding: 0.3rem 0.75rem; border: 1px solid rgba(13,148,136,0.3); border-radius: 100px;
  }

  /* IMPACT */
  .impact { background: var(--navy-mid); }
  .impact-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px;
    background: rgba(255,255,255,0.06); border-radius: 14px; overflow: hidden; margin-top: 3rem;
  }
  .impact-cell { background: var(--navy-mid); padding: 2.5rem 2rem; text-align: center; transition: background 0.25s; }
  .impact-cell:hover { background: rgba(13,148,136,0.07); }
  .impact-big { font-family: 'Cormorant Garamond', serif; font-size: 3rem; font-weight: 300; color: var(--white); display: block; }
  .impact-big span { color: var(--teal-light); }
  .impact-desc { font-size: 0.82rem; color: var(--gray); margin-top: 0.5rem; text-transform: uppercase; letter-spacing: 0.08em; }

  /* RESEARCH */
  .research { background: var(--navy-mid); }
  .research-list { display: flex; flex-direction: column; gap: 1px; margin-top: 3rem; }
  .research-item {
    background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.06);
    border-radius: 10px; padding: 1.8rem 2rem;
    display: flex; justify-content: space-between; align-items: center;
    gap: 2rem; margin-bottom: 0.8rem; transition: all 0.25s;
  }
  .research-item:hover { border-color: rgba(13,148,136,0.35); background: var(--teal-glow); }
  .research-body h4 { font-size: 1rem; font-weight: 500; margin-bottom: 0.4rem; }
  .research-body p { font-size: 0.84rem; color: var(--gray); line-height: 1.6; }
  .research-meta { text-align: right; flex-shrink: 0; }
  .research-status {
    display: inline-block; font-size: 0.7rem; letter-spacing: 0.1em; text-transform: uppercase;
    padding: 0.3rem 0.8rem; border-radius: 100px; margin-bottom: 0.5rem;
  }
  .status-active { background: rgba(13,148,136,0.15); color: var(--teal-light); border: 1px solid rgba(13,148,136,0.3); }
  .status-ongoing { background: rgba(201,168,76,0.1); color: var(--gold); border: 1px solid rgba(201,168,76,0.3); }
  .status-planned { background: rgba(255,255,255,0.05); color: var(--gray); border: 1px solid rgba(255,255,255,0.1); }
  .research-date { font-size: 0.75rem; color: var(--gray); display: block; }

  /* ADVISORS */
  .advisors { background: var(--navy); }
  .advisor-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1.2rem; margin-top: 3rem; }
  .advisor-card {
    background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);
    border-radius: 12px; padding: 1.5rem; transition: all 0.25s;
  }
  .advisor-card:hover { border-color: rgba(201,168,76,0.35); background: rgba(201,168,76,0.04); }
  .advisor-initials {
    width: 48px; height: 48px; border-radius: 10px;
    background: linear-gradient(135deg, rgba(13,148,136,0.2), rgba(13,148,136,0.05));
    border: 1px solid rgba(13,148,136,0.25);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Cormorant Garamond', serif; font-size: 1rem; font-weight: 600;
    color: var(--teal-light); margin-bottom: 1rem;
  }
  .advisor-card h4 { font-size: 0.9rem; font-weight: 500; margin-bottom: 0.3rem; }
  .advisor-card p { font-size: 0.78rem; color: var(--gray); line-height: 1.5; }
  .advisor-role { color: var(--teal-light); font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; margin-top: 0.5rem; }

  /* DONATE */
  .donate { background: linear-gradient(135deg, var(--teal) 0%, #0a6b62 100%); position: relative; overflow: hidden; }
  .donate::before {
    content: ''; position: absolute; top: -50%; right: -20%;
    width: 600px; height: 600px; border-radius: 50%;
    background: rgba(255,255,255,0.05); pointer-events: none;
  }
  .donate-inner { position: relative; z-index: 1; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }
  .donate h2 { font-family: 'Cormorant Garamond', serif; font-size: clamp(2rem, 4vw, 3rem); font-weight: 300; line-height: 1.2; margin-bottom: 1rem; }
  .donate p { color: rgba(255,255,255,0.8); line-height: 1.7; font-weight: 300; }
  .donate-amounts { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.8rem; margin-bottom: 1.2rem; }
  .amt-btn {
    background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25);
    color: white; border-radius: 8px; padding: 0.9rem;
    font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; font-weight: 400;
    cursor: pointer; transition: all 0.2s; text-align: center;
  }
  .amt-btn:hover, .amt-btn.active { background: rgba(255,255,255,0.3); border-color: rgba(255,255,255,0.6); }
  .donate-form-row { display: flex; gap: 0.8rem; }
  .donate-input {
    flex: 1; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3);
    border-radius: 8px; padding: 0.85rem 1rem; color: white; font-size: 0.95rem;
    font-family: 'DM Sans', sans-serif; outline: none;
  }
  .donate-input::placeholder { color: rgba(255,255,255,0.5); }
  .donate-input:focus { border-color: rgba(255,255,255,0.7); }
  .donate-submit {
    background: var(--gold); color: var(--navy); border: none; border-radius: 8px;
    padding: 0.85rem 1.8rem; font-weight: 600; font-size: 0.95rem; cursor: pointer;
    transition: all 0.2s; white-space: nowrap;
  }
  .donate-submit:hover { background: #d4b66a; transform: translateY(-1px); }
  .donate-note { font-size: 0.75rem; color: rgba(255,255,255,0.6); margin-top: 0.8rem; }

  /* CONTACT */
  .contact { background: var(--navy); }
  .contact-grid { display: grid; grid-template-columns: 1fr 1.5fr; gap: 5rem; margin-top: 3rem; align-items: start; }
  .contact-info h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; font-weight: 300; margin-bottom: 1rem; }
  .contact-info p { color: var(--gray); line-height: 1.7; font-size: 0.9rem; margin-bottom: 1.5rem; }
  .contact-detail { display: flex; align-items: center; gap: 0.75rem; padding: 0.8rem 0; border-bottom: 1px solid rgba(255,255,255,0.06); font-size: 0.85rem; color: var(--gray); }
  .contact-detail span:first-child { color: var(--teal-light); font-size: 1rem; }
  .contact-form { display: flex; flex-direction: column; gap: 1rem; }
  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
  .form-group { display: flex; flex-direction: column; gap: 0.4rem; }
  .form-group label { font-size: 0.78rem; letter-spacing: 0.05em; color: var(--gray); text-transform: uppercase; }
  .form-group input, .form-group textarea, .form-group select {
    background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1);
    border-radius: 8px; padding: 0.85rem 1rem; color: white;
    font-family: 'DM Sans', sans-serif; font-size: 0.9rem; outline: none; transition: border-color 0.2s;
  }
  .form-group select option { background: var(--navy-mid); color: white; }
  .form-group input:focus, .form-group textarea:focus { border-color: rgba(13,148,136,0.5); }
  .form-group textarea { resize: vertical; min-height: 120px; }

  /* FOOTER */
  footer { background: #060e1a; padding: 3rem 4rem 2rem; border-top: 1px solid rgba(255,255,255,0.06); }
  .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem; margin-bottom: 3rem; }
  .footer-brand p { color: var(--gray); font-size: 0.85rem; line-height: 1.7; margin-top: 1rem; max-width: 280px; }
  .footer-col h5 { font-size: 0.78rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--gray); margin-bottom: 1.2rem; }
  .footer-col a { display: block; color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.85rem; margin-bottom: 0.6rem; transition: color 0.2s; }
  .footer-col a:hover { color: var(--teal-light); }
  .footer-bottom { display: flex; justify-content: space-between; align-items: center; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.06); font-size: 0.78rem; color: var(--gray); }
  .footer-501 { display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(13,148,136,0.1); border: 1px solid rgba(13,148,136,0.2); border-radius: 100px; padding: 0.3rem 0.9rem; font-size: 0.72rem; color: var(--teal-light); letter-spacing: 0.08em; }

  /* SCROLL REVEAL */
  .reveal { opacity: 0; transform: translateY(30px); transition: opacity 0.7s ease, transform 0.7s ease; }
  .reveal.visible { opacity: 1; transform: translateY(0); }

  /* RESPONSIVE */
  @media (max-width: 900px) {
    nav { padding: 1rem 1.5rem; }
    .nav-links { display: none; }
    section { padding: 4rem 1.5rem; }
    .hero { padding: 6rem 1.5rem 4rem; }
    .about-grid, .donate-inner, .contact-grid, .footer-grid { grid-template-columns: 1fr; gap: 2.5rem; }
    .disease-cards { grid-template-columns: 1fr; }
    .impact-grid { grid-template-columns: 1fr 1fr; }
    .hero-stats { flex-wrap: wrap; gap: 1.5rem; }
    .mission-strip { padding: 1rem 1.5rem; text-align: center; }
    .footer-bottom { flex-direction: column; gap: 1rem; text-align: center; }
  }
</style>
</head>
<body>

<nav>
  <a class="nav-logo" href="#">
    <div class="nav-logo-mark">BN</div>
    <span class="nav-logo-text">BioNeoMed</span>
  </a>
  <div class="nav-links">
    <a href="#about">About</a>
    <a href="#diseases">Diseases</a>
    <a href="#research">Research</a>
    <a href="#advisors">Advisors</a>
    <a href="#contact">Contact</a>
    <a href="#donate" class="nav-cta">Donate</a>
  </div>
</nav>

<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-grid"></div>
  <div class="hero-content">
    <div class="hero-badge">501(c)(3) Nonprofit · EIN Registered</div>
    <h1>Curing <em>Lyme,</em><br>Bartonella &amp;<br><span>Babesia</span></h1>
    <p class="hero-sub">BioNeoMed Research Foundation funds cutting-edge scientific research into tick-borne diseases that millions suffer from in silence — driven entirely by volunteers, powered by your generosity.</p>
    <div class="hero-actions">
      <a href="#donate" class="btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
        Donate Now
      </a>
      <a href="#research" class="btn-outline">
        View Research
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
    <div class="hero-stats">
      <div class="stat-item">
        <span class="stat-num">95<small style="font-size:1.2rem">%</small></span>
        <span class="stat-label">Funds to Research</span>
      </div>
      <div class="stat-item">
        <span class="stat-num">100<small style="font-size:1.2rem">%</small></span>
        <span class="stat-label">Volunteer Run</span>
      </div>
      <div class="stat-item">
        <span class="stat-num">3</span>
        <span class="stat-label">Diseases Targeted</span>
      </div>
      <div class="stat-item">
        <span class="stat-num">$0</span>
        <span class="stat-label">Admin Overhead</span>
      </div>
    </div>
  </div>
</section>

<div class="mission-strip">
  <strong>Our Promise:</strong> Every dollar you donate goes directly to research. Zero overhead. Zero agency fees. Zero compromises.
</div>

<section class="about" id="about">
  <div class="section-label">// About the Foundation</div>
  <h2 class="section-title">Science-first.<br><em>Patient-driven.</em></h2>
  <div class="about-grid reveal">
    <div class="about-text">
      <p>BioNeoMed Research Foundation is a <strong>registered 501(c)(3) nonprofit</strong> dedicated to funding breakthrough research into tick-borne illnesses that affect millions of Americans — yet receive a fraction of the medical attention they deserve.</p>
      <p>We believe that <strong>Lyme disease, Bartonella, and Babesia</strong> represent one of the most underserved crises in modern medicine. Patients are misdiagnosed, dismissed, and left without effective treatments for years. We exist to change that.</p>
      <div class="highlight">"The Foundation exists because patients needed someone in their corner. Science is our weapon, and your donation is our ammunition."</div>
      <p>100% volunteer-operated, we ensure that <strong>95 cents of every dollar</strong> goes directly into scientific research, not administration. Our lean model means your generosity has maximum impact.</p>
    </div>
    <div class="about-pillars">
      <div class="pillar">
        <div class="pillar-icon">🔬</div>
        <div class="pillar-body">
          <h4>Fund Breakthrough Research</h4>
          <p>We support peer-reviewed scientific studies into the mechanisms, diagnosis, and treatment of tick-borne diseases.</p>
        </div>
      </div>
      <div class="pillar">
        <div class="pillar-icon">📢</div>
        <div class="pillar-body">
          <h4>Raise Awareness</h4>
          <p>We educate the public, medical professionals, and policymakers about the real burden of chronic tick-borne illness.</p>
        </div>
      </div>
      <div class="pillar">
        <div class="pillar-icon">🤝</div>
        <div class="pillar-body">
          <h4>Support Patients</h4>
          <p>We connect patients to the latest research, clinical trials, and a community of advocates who understand their journey.</p>
        </div>
      </div>
      <div class="pillar">
        <div class="pillar-icon">🏛️</div>
        <div class="pillar-body">
          <h4>Policy &amp; Advocacy</h4>
          <p>We push for change at the institutional level — better diagnostic standards, more funding, and improved treatment protocols.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="diseases" id="diseases">
  <div class="section-label">// Research Focus Areas</div>
  <h2 class="section-title">The diseases<br>we're <em>fighting</em></h2>
  <div class="disease-cards reveal">
    <div class="disease-card">
      <span class="disease-num">01 / Disease</span>
      <h3>Lyme Disease</h3>
      <p>Caused by <em>Borrelia burgdorferi</em>, Lyme disease is the most common tick-borne illness in the United States. When left untreated or inadequately treated, it can lead to debilitating chronic symptoms affecting the joints, nervous system, and heart.</p>
      <div style="margin-top:1rem; font-size:0.82rem; color:var(--gray);"><strong style="color:var(--white)">476,000+</strong> Americans diagnosed annually</div>
      <span class="disease-tag">Primary Focus</span>
    </div>
    <div class="disease-card">
      <span class="disease-num">02 / Disease</span>
      <h3>Bartonella</h3>
      <p>Often called "Cat Scratch Disease," Bartonella is a bacterial infection transmitted by ticks, fleas, and lice. It can cause neurological symptoms, heart problems, and has been linked to psychiatric manifestations that are frequently misdiagnosed.</p>
      <div style="margin-top:1rem; font-size:0.82rem; color:var(--gray);"><strong style="color:var(--white)">Severely</strong> underdiagnosed globally</div>
      <span class="disease-tag">Active Research</span>
    </div>
    <div class="disease-card">
      <span class="disease-num">03 / Disease</span>
      <h3>Babesia</h3>
      <p>A malaria-like parasitic infection, Babesia infects and destroys red blood cells. It can cause severe, life-threatening illness in immunocompromised patients and is increasingly recognized as a serious co-infection alongside Lyme disease.</p>
      <div style="margin-top:1rem; font-size:0.82rem; color:var(--gray);"><strong style="color:var(--white)">Co-infection</strong> with Lyme in 40%+ of cases</div>
      <span class="disease-tag">Emerging Research</span>
    </div>
  </div>
</section>

<section class="impact" id="impact">
  <div class="section-label">// Our Impact</div>
  <h2 class="section-title">Numbers that<br><em>matter</em></h2>
  <div class="impact-grid reveal">
    <div class="impact-cell">
      <span class="impact-big">95<span>%</span></span>
      <div class="impact-desc">Funds to Research</div>
    </div>
    <div class="impact-cell">
      <span class="impact-big">100<span>%</span></span>
      <div class="impact-desc">Volunteer Operated</div>
    </div>
    <div class="impact-cell">
      <span class="impact-big">$0</span>
      <div class="impact-desc">Admin Overhead</div>
    </div>
    <div class="impact-cell">
      <span class="impact-big">501<span>c3</span></span>
      <div class="impact-desc">Tax-Deductible Gifts</div>
    </div>
  </div>
  <div style="margin-top:2rem; padding:2rem; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); border-radius:12px; display:flex; align-items:center; gap:2rem; flex-wrap:wrap;">
    <div style="flex:1; min-width:220px;">
      <div class="section-label" style="margin:0 0 0.4rem">Annual Goal</div>
      <div style="font-family:'Cormorant Garamond',serif; font-size:2rem; font-weight:300;">$50,000 <span style="color:var(--gray); font-size:1.2rem">Year 1 Target</span></div>
    </div>
    <div style="flex:2; min-width:280px;">
      <div style="background:rgba(255,255,255,0.06); border-radius:100px; height:10px; overflow:hidden;">
        <div style="width:34%; height:100%; background:linear-gradient(90deg, var(--teal), var(--teal-light)); border-radius:100px;"></div>
      </div>
      <div style="display:flex; justify-content:space-between; margin-top:0.5rem; font-size:0.8rem; color:var(--gray);">
        <span>$17,000 raised</span><span>34% of goal</span>
      </div>
    </div>
    <a href="#donate" class="btn-primary" style="flex-shrink:0;">Help Us Reach It</a>
  </div>
</section>

<section class="research" id="research">
  <div class="section-label">// Active Research Projects</div>
  <h2 class="section-title">What we're<br><em>working on</em></h2>
  <div class="research-list reveal">
    <div class="research-item">
      <div class="research-body">
        <h4>Borrelia Persistence Mechanisms in Antibiotic-Treated Patients</h4>
        <p>Investigating why Lyme disease symptoms persist in patients who have received standard antibiotic protocols, with a focus on biofilm formation and immune evasion strategies.</p>
      </div>
      <div class="research-meta">
        <span class="research-status status-active">Active</span>
        <span class="research-date">Est. 2024</span>
      </div>
    </div>
    <div class="research-item">
      <div class="research-body">
        <h4>Bartonella Neurological Co-Infection Study</h4>
        <p>Examining the correlation between Bartonella infection and psychiatric / neurological symptoms in patients previously diagnosed with conditions such as fibromyalgia and ME/CFS.</p>
      </div>
      <div class="research-meta">
        <span class="research-status status-active">Active</span>
        <span class="research-date">Est. 2024</span>
      </div>
    </div>
    <div class="research-item">
      <div class="research-body">
        <h4>Novel Diagnostic Biomarkers for Early Tick-Borne Disease Detection</h4>
        <p>Developing more sensitive and specific blood-based biomarkers to enable earlier, more accurate diagnosis of Lyme, Bartonella, and Babesia infections.</p>
      </div>
      <div class="research-meta">
        <span class="research-status status-ongoing">Ongoing</span>
        <span class="research-date">Est. 2025</span>
      </div>
    </div>
    <div class="research-item">
      <div class="research-body">
        <h4>Combination Therapy Efficacy in Babesia Co-Infections</h4>
        <p>Clinical review of combination anti-parasitic and antibiotic therapies for patients presenting with simultaneous Babesia and Lyme disease infections.</p>
      </div>
      <div class="research-meta">
        <span class="research-status status-planned">Planned</span>
        <span class="research-date">Q2 2026</span>
      </div>
    </div>
  </div>
</section>

<section class="advisors" id="advisors">
  <div class="section-label">// Scientific Advisory Board</div>
  <h2 class="section-title">Guided by<br><em>leading experts</em></h2>
  <div class="advisor-grid reveal">
    <div class="advisor-card">
      <div class="advisor-initials">KL</div>
      <h4>Dr. Kenneth Liegner</h4>
      <p>Pioneer in the diagnosis and treatment of Lyme disease with decades of clinical and research experience.</p>
      <div class="advisor-role">Scientific Advisor</div>
    </div>
    <div class="advisor-card">
      <div class="advisor-initials">DK</div>
      <h4>Dr. Daniel Kinderlehrer</h4>
      <p>Integrative medicine physician specializing in tick-borne illness and chronic Lyme disease treatment protocols.</p>
      <div class="advisor-role">Scientific Advisor</div>
    </div>
    <div class="advisor-card">
      <div class="advisor-initials">MD</div>
      <h4>Medical Director</h4>
      <p>Board-certified specialist overseeing research direction, clinical trial design, and scientific integrity.</p>
      <div class="advisor-role">Research Oversight</div>
    </div>
    <div class="advisor-card">
      <div class="advisor-initials">+</div>
      <h4>Join Our Board</h4>
      <p>We are actively seeking researchers, clinicians, and patient advocates to strengthen our advisory board.</p>
      <div class="advisor-role" style="color:var(--gold);">Open Position</div>
    </div>
  </div>
</section>

<section class="donate" id="donate">
  <div class="donate-inner">
    <div>
      <div class="section-label" style="color:rgba(255,255,255,0.7)">// Make a Difference</div>
      <h2>Your donation<br>funds <em style="color:var(--gold)">real science</em></h2>
      <p style="margin-top:1rem">Every dollar goes directly toward research grants, laboratory studies, and scientific publications. We take nothing for ourselves — this is 100% for the patients who need answers.</p>
      <div style="display:flex; gap:1.5rem; margin-top:2rem; flex-wrap:wrap;">
        <div>
          <div style="font-family:'Cormorant Garamond',serif; font-size:1.5rem; font-weight:400; color:var(--gold)">$25</div>
          <div style="font-size:0.78rem; color:rgba(255,255,255,0.7)">Funds lab supplies</div>
        </div>
        <div>
          <div style="font-family:'Cormorant Garamond',serif; font-size:1.5rem; font-weight:400; color:var(--gold)">$100</div>
          <div style="font-size:0.78rem; color:rgba(255,255,255,0.7)">Funds a sample analysis</div>
        </div>
        <div>
          <div style="font-family:'Cormorant Garamond',serif; font-size:1.5rem; font-weight:400; color:var(--gold)">$500</div>
          <div style="font-size:0.78rem; color:rgba(255,255,255,0.7)">Funds a research day</div>
        </div>
      </div>
    </div>
    <div>
      <div style="background:rgba(0,0,0,0.15); border:1px solid rgba(255,255,255,0.15); border-radius:16px; padding:2rem;">
        <div style="font-size:0.85rem; color:rgba(255,255,255,0.8); margin-bottom:1rem; font-weight:500;">Choose an amount</div>
        <div class="donate-amounts">
          <button class="amt-btn active" onclick="selectAmt(this)">$25</button>
          <button class="amt-btn" onclick="selectAmt(this)">$50</button>
          <button class="amt-btn" onclick="selectAmt(this)">$100</button>
          <button class="amt-btn" onclick="selectAmt(this)">$250</button>
          <button class="amt-btn" onclick="selectAmt(this)">$500</button>
          <button class="amt-btn" onclick="selectAmt(this)">Other</button>
        </div>
        <div class="donate-form-row">
          <input class="donate-input" type="email" placeholder="your@email.com">
          <button class="donate-submit">Donate →</button>
        </div>
        <p class="donate-note">🔒 Secure via Zeffy · 100% goes to research · Tax-deductible 501(c)(3)</p>
        <div style="display:flex; gap:1rem; margin-top:1rem; flex-wrap:wrap;">
          <label style="display:flex; align-items:center; gap:0.4rem; font-size:0.82rem; cursor:pointer;">
            <input type="radio" name="freq" checked style="accent-color:white"> <span style="color:rgba(255,255,255,0.8)">One-time</span>
          </label>
          <label style="display:flex; align-items:center; gap:0.4rem; font-size:0.82rem; cursor:pointer;">
            <input type="radio" name="freq" style="accent-color:white"> <span style="color:rgba(255,255,255,0.8)">Monthly</span>
          </label>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="contact" id="contact">
  <div class="section-label">// Get in Touch</div>
  <h2 class="section-title">Connect<br>with <em>us</em></h2>
  <div class="contact-grid reveal">
    <div class="contact-info">
      <h3>We'd love to hear from you.</h3>
      <p>Whether you're a patient, researcher, donor, or advocate — your voice matters to us. Reach out with questions, research proposals, volunteer inquiries, or media requests.</p>
      <div class="contact-detail"><span>✉</span><span>info@bioneomed.org</span></div>
      <div class="contact-detail"><span>🌐</span><span>www.bioneomed.org</span></div>
      <div class="contact-detail"><span>🏛</span><span>United States · 501(c)(3) Registered</span></div>
      <div style="margin-top:2rem;">
        <div style="font-size:0.78rem; letter-spacing:0.1em; text-transform:uppercase; color:var(--gray); margin-bottom:0.8rem">Follow Our Research</div>
        <div style="display:flex; gap:0.8rem;">
          <a href="#" style="width:38px;height:38px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--gray); text-decoration:none; font-size:0.85rem; transition:all 0.2s;" onmouseover="this.style.borderColor='rgba(13,148,136,0.5)';this.style.color='#14b8a6'" onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.color='#94a3b8'">𝕏</a>
          <a href="#" style="width:38px;height:38px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--gray); text-decoration:none; font-size:0.85rem; transition:all 0.2s;" onmouseover="this.style.borderColor='rgba(13,148,136,0.5)';this.style.color='#14b8a6'" onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.color='#94a3b8'">in</a>
          <a href="#" style="width:38px;height:38px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--gray); text-decoration:none; font-size:0.85rem; transition:all 0.2s;" onmouseover="this.style.borderColor='rgba(13,148,136,0.5)';this.style.color='#14b8a6'" onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.color='#94a3b8'">fb</a>
        </div>
      </div>
    </div>
    <form class="contact-form" onsubmit="handleContact(event)">
      <div class="form-row">
        <div class="form-group">
          <label>First Name</label>
          <input type="text" placeholder="Jane" required>
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" placeholder="Smith" required>
        </div>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" placeholder="jane@example.com" required>
      </div>
      <div class="form-group">
        <label>I am a...</label>
        <select>
          <option>Patient / Caregiver</option>
          <option>Researcher / Clinician</option>
          <option>Donor / Supporter</option>
          <option>Journalist / Media</option>
          <option>Volunteer</option>
          <option>Other</option>
        </select>
      </div>
      <div class="form-group">
        <label>Message</label>
        <textarea placeholder="Tell us how we can help, or how you'd like to get involved..."></textarea>
      </div>
      <button type="submit" class="btn-primary" style="align-self:flex-start;">
        Send Message
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </button>
      <div id="contact-success" style="display:none; color:var(--teal-light); font-size:0.9rem; margin-top:0.5rem;">✓ Message sent! We'll be in touch shortly.</div>
    </form>
  </div>
</section>

<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <a class="nav-logo" href="#" style="margin-bottom:0.5rem; display:inline-flex;">
        <div class="nav-logo-mark">BN</div>
        <span class="nav-logo-text" style="font-size:1.05rem;">BioNeoMed</span>
      </a>
      <p>A 501(c)(3) nonprofit research foundation dedicated to funding breakthrough science for Lyme disease, Bartonella, and Babesia. Every dollar goes to research.</p>
    </div>
    <div class="footer-col">
      <h5>Foundation</h5>
      <a href="#about">About Us</a>
      <a href="#advisors">Advisory Board</a>
      <a href="#research">Research Projects</a>
      <a href="#impact">Our Impact</a>
    </div>
    <div class="footer-col">
      <h5>Diseases</h5>
      <a href="#diseases">Lyme Disease</a>
      <a href="#diseases">Bartonella</a>
      <a href="#diseases">Babesia</a>
      <a href="#research">Co-Infections</a>
    </div>
    <div class="footer-col">
      <h5>Get Involved</h5>
      <a href="#donate">Donate Now</a>
      <a href="#contact">Volunteer</a>
      <a href="#contact">Partner With Us</a>
      <a href="#contact">Contact</a>
    </div>
  </div>
  <div class="footer-bottom">
    <div>
      <span class="footer-501">✦ 501(c)(3) Nonprofit</span>
      &nbsp;&nbsp;© <?php echo date('Y'); ?> BioNeoMed Research Foundation. All rights reserved.
    </div>
    <div style="display:flex; gap:1.5rem;">
      <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" style="color:var(--gray); text-decoration:none; font-size:0.78rem; transition:color 0.2s;" onmouseover="this.style.color='#14b8a6'" onmouseout="this.style.color='#94a3b8'">Privacy Policy</a>
      <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>" style="color:var(--gray); text-decoration:none; font-size:0.78rem; transition:color 0.2s;" onmouseover="this.style.color='#14b8a6'" onmouseout="this.style.color='#94a3b8'">Terms of Service</a>
      <a href="<?php echo esc_url(admin_url()); ?>" style="color:var(--gray); text-decoration:none; font-size:0.78rem; transition:color 0.2s;" onmouseover="this.style.color='#14b8a6'" onmouseout="this.style.color='#94a3b8'">Admin</a>
    </div>
  </div>
</footer>

<script>
  const revealEls = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.12 });
  revealEls.forEach(el => observer.observe(el));

  window.addEventListener('scroll', () => {
    document.querySelector('nav').style.background =
      window.scrollY > 60 ? 'rgba(10,22,40,0.97)' : 'rgba(10,22,40,0.85)';
  });

  function selectAmt(btn) {
    document.querySelectorAll('.amt-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
  }

  function handleContact(e) {
    e.preventDefault();
    document.getElementById('contact-success').style.display = 'block';
    e.target.reset();
    setTimeout(() => { document.getElementById('contact-success').style.display = 'none'; }, 5000);
  }
</script>
<?php wp_footer(); ?>
</body>
</html>
