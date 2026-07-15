import { DOCUMENT } from '@angular/common';
import { inject, Injectable } from '@angular/core';
import { TranslateService } from '@ngx-translate/core';

// Definimos los únicos idiomas permitidos en la aplicación.
// Gracias a este tipo, TypeScript impedirá usar idiomas no soportados.
export type SupportedLanguage = 'es' | 'en';

@Injectable({
  providedIn: 'root' // Hace que exista una única instancia del servicio en toda la aplicación.
})
export class LanguageService {

  // Inyectamos el servicio de traducción de ngx-translate.
  private readonly translateService = inject(TranslateService);

  // Inyectamos el objeto Document para poder modificar el atributo <html lang="">
  private readonly document = inject(DOCUMENT);

  // Clave utilizada para guardar el idioma en el navegador.
  private readonly storageKey = 'maysa-language';

  // Idioma que utilizaremos cuando no podamos determinar otro.
  private readonly fallbackLanguage: SupportedLanguage = 'es';

  // Lista de idiomas admitidos por la aplicación.
  private readonly supportedLanguages: SupportedLanguage[] = ['es', 'en'];

  /**
   * Inicializa el idioma cuando arranca la aplicación.
   *
   * Orden de prioridad:
   * 1. Idioma guardado por el usuario.
   * 2. Idioma del navegador.
   * 3. Español como idioma por defecto.
   */
  initializeLanguage(): void {

    const savedLanguage = this.getSavedLanguage();

    const browserLanguage = this.getBrowserLanguage();

    const initialLanguage =
      savedLanguage ??
      browserLanguage ??
      this.fallbackLanguage;

    this.setLanguage(initialLanguage);
  }

  /**
   * Cambia el idioma de toda la aplicación.
   */
  setLanguage(language: SupportedLanguage): void {

    // Si el idioma recibido no está soportado,
    // utilizamos el idioma por defecto.
    if (!this.isSupportedLanguage(language)) {
      language = this.fallbackLanguage;
    }

    // Cambia el idioma utilizado por ngx-translate.
    this.translateService.use(language);

    // Guarda la preferencia del usuario.
    localStorage.setItem(this.storageKey, language);

    // Actualiza el atributo:
    // <html lang="es"> o <html lang="en">
    this.document.documentElement.lang = language;
  }

  /**
   * Devuelve el idioma actualmente activo.
   */
  getCurrentLanguage(): SupportedLanguage {

    const currentLanguage =
      this.translateService.currentLang();

    return this.isSupportedLanguage(currentLanguage)
      ? currentLanguage
      : this.fallbackLanguage;
  }

  /**
   * Comprueba si un idioma concreto es el activo.
   *
   * Muy útil para marcar visualmente el botón ES o EN.
   */
  isCurrentLanguage(language: SupportedLanguage): boolean {

    return this.getCurrentLanguage() === language;
  }

  /**
   * Recupera el idioma almacenado en localStorage.
   *
   * Si no existe o no es válido devuelve null.
   */
  private getSavedLanguage(): SupportedLanguage | null {

    const savedLanguage =
      localStorage.getItem(this.storageKey);

    return this.isSupportedLanguage(savedLanguage)
      ? savedLanguage
      : null;
  }

  /**
   * Obtiene el idioma del navegador.
   *
   * navigator.language suele devolver valores como:
   *
   * es-ES
   * en-GB
   * en-US
   *
   * Nos quedamos únicamente con:
   *
   * es
   * en
   */
  private getBrowserLanguage(): SupportedLanguage | null {

    const browserLanguage =
      navigator.language
        .toLowerCase()
        .split('-')[0];

    return this.isSupportedLanguage(browserLanguage)
      ? browserLanguage
      : null;
  }

  /**
   * Comprueba si un idioma pertenece a la lista
   * de idiomas soportados por Maysa.
   */
  private isSupportedLanguage(
    language: string | null
  ): language is SupportedLanguage {

    return this.supportedLanguages.includes(
      language as SupportedLanguage
    );
  }

}