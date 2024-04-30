import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TraineeComponent } from './trainee.component';

describe('TraineeComponent', () => {
  let component: TraineeComponent;
  let fixture: ComponentFixture<TraineeComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [TraineeComponent]
    });
    fixture = TestBed.createComponent(TraineeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
