import { Component, inject } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { TranslatePipe } from '@ngx-translate/core';
import { LanguageService, SupportedLanguage } from '../../service/lenguage.service.ts';

@Component({
  selector: 'app-navbar',
  imports: [RouterLink, RouterLinkActive, TranslatePipe],
  templateUrl: './navbar.html',
  styleUrl: './navbar.css',
})
export class Navbar {
  public menuOpen = false;

  private readonly languageService = inject(LanguageService);

  public toggleMenu(): void {
    this.menuOpen = !this.menuOpen;
  }

  public closeMenu(): void {
    this.menuOpen = false;
  }
  /**
   * Solicita al LanguageService que cambie el idioma de la aplicación.
   */
  public changeLanguage(language: SupportedLanguage): void {
    this.languageService.setLanguage(language);
  }

  /**
   * Comprueba si un idioma es el que está activo actualmente.
   * Más adelante lo usaremos para resaltar ES o EN visualmente.
   */
  public isCurrentLanguage(language: SupportedLanguage): boolean {
    return this.languageService.isCurrentLanguage(language);
  }
}
