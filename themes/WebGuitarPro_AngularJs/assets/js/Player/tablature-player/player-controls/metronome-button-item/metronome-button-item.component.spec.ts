import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MetronomeButtonItemComponent } from './metronome-button-item.component';

describe('MetronomeButtonItemComponent', () => {
  let component: MetronomeButtonItemComponent;
  let fixture: ComponentFixture<MetronomeButtonItemComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MetronomeButtonItemComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(MetronomeButtonItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
