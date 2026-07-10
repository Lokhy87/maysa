import { TestBed } from '@angular/core/testing';

import { LenguageServiceTs } from './lenguage.service.ts';

describe('LenguageServiceTs', () => {
  let service: LenguageServiceTs;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(LenguageServiceTs);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
