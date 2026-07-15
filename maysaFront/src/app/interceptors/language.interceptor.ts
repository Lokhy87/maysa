import { HttpInterceptorFn } from '@angular/common/http';
import { inject } from '@angular/core';
import { environment } from '../../environments/environment';
import { LanguageService } from '../service/language.service';

export const languageInterceptor: HttpInterceptorFn = (request, next) => {
  // No interceptamos los JSON de ngx-translate ni otras peticiones.
  if (!request.url.startsWith(environment.apiUrl)) {
    return next(request);
  }

  const languageService = inject(LanguageService);
  const language = languageService.getCurrentLanguage();

  const requestWithLanguage = request.clone({
    setHeaders: {
      'Accept-Language': language,
    },
  });

  return next(requestWithLanguage);
};