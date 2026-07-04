import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Massage } from '../interfaces/massage.interface';
import { MassageCollection } from '../interfaces/massageCollection.interface';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root',
})
export class MaysaApi {
  private http = inject(HttpClient);
  public getMassages(): Observable<Massage[]> {
    return this.http.get<Massage[]>(`${environment.apiUrl}/massages`);
  }
  public getMassagesCollections(): Observable<MassageCollection[]> {
    return this.http.get<MassageCollection[]>(`${environment.apiUrl}/massage/collections`);
  }
  getMassageById(id: number): Observable<Massage> {
    return this.http.get<Massage>(`${environment.apiUrl}/massages/${id}`);
  }
}
