import { Component, inject, signal } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { Navbar } from './components/navbar/navbar';
import { Footer } from './components/footer/footer';
import { LanguageService } from './service/lenguage.service.ts';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, Navbar, Footer],
  templateUrl: './app.html',
  styleUrl: './app.css',
})
export class App {
  protected readonly title = signal('maysaFront');

  // Inyectamos el servicio que gestiona el idioma de toda la aplicación.
  private readonly languageService = inject(LanguageService);

  constructor() {
    // Al arrancar Maysa, el servicio decide qué idioma debe utilizar:
    // idioma guardado, idioma del navegador o español como fallback.
    this.languageService.initializeLanguage();
  }
}
