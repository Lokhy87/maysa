import { Component, EventEmitter, Input, Output } from '@angular/core';
import { Massage } from '../../interfaces/massage.interface';

@Component({
  selector: 'app-modal',
  imports: [],
  templateUrl: './modal.html',
  styleUrl: './modal.css',
})
export class Modal {
  @Input() massage!: Massage;

  @Output() close = new EventEmitter<void>();
}
