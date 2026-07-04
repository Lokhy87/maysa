import { ChangeDetectorRef, Component, inject } from '@angular/core';
import { MaysaApi } from '../../service/maysa-api';
import { Massage } from '../../interfaces/massage.interface';
import { MassageCollection } from '../../interfaces/massageCollection.interface';
import { Modal } from '../../components/modal/modal';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-experiences',
  imports: [Modal],
  templateUrl: './experiences.html',
  styleUrl: './experiences.css',
})
export class Experiences {
  private cdr = inject(ChangeDetectorRef);
  public massageService = inject(MaysaApi);

  public collections: MassageCollection[] = [];
  public massages: Massage[] = [];
  public selectedMassage: Massage | null = null;

  public openModal(massage: Massage): void {
    this.massageService.getMassageById(massage.id).subscribe({
      next: (data) => {
        this.selectedMassage = data;
        this.cdr.detectChanges();
      },
      error: (error) => console.error(error),
    });
  }

  ngOnInit(): void {
    this.massageService.getMassagesCollections().subscribe({
      next: (data) => {
        this.collections = data;
        this.cdr.detectChanges();
      },
      error: (error) => console.error(error),
    });

    this.massageService.getMassages().subscribe({
      next: (data) => {
        console.log('MASAJES:', data);
        this.massages = data;

        this.cdr.detectChanges();
      },
      error: (error) => console.error(error),
    });
  }

  public getMassagesByCollection(collectionName: string): Massage[] {
    return this.massages.filter((massage) => massage.collection.name === collectionName);
  }

  public closeModal() {
    this.selectedMassage = null;
    this.cdr.detectChanges();
  }
}
