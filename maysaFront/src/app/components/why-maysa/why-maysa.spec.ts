import { ComponentFixture, TestBed } from '@angular/core/testing';

import { WhyMaysa } from './why-maysa';

describe('WhyMaysa', () => {
  let component: WhyMaysa;
  let fixture: ComponentFixture<WhyMaysa>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [WhyMaysa],
    }).compileComponents();

    fixture = TestBed.createComponent(WhyMaysa);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
